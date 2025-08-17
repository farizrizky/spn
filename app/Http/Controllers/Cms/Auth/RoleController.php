<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    public function index()
    {
       Gate::authorize('viewAny', Role::class);
        $data = [
            'role' => Role::all(),
        ];

        return view('cms.page.role.index', $data);
    }

    public function create()
    {
        Gate::authorize('create', Role::class);
        $data = [
            'permission' => Permission::all()->map(function ($permission) {
                $parts = explode('.', $permission->name);
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'feature' => $parts[0] ?? '',
                    'access' => $parts[1] ?? ''
                ];
            }),
        ];
        return view('cms.page.role.create', $data);
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Role::class);
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permission' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->route('cms.role.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        Gate::authorize('update', $role);
        if(!$role) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        if($role->name == 'Administrator') {
            $notify = NotifyHelper::errorOccurred('Role Administrator tidak dapat diubah.');
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        $data = [
            'role' => $role,
            'role_permissions' => $role->permissions,
            'permission' => Permission::all()->map(function ($permission) {
                $parts = explode('.', $permission->name);
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'feature' => $parts[0] ?? '',
                    'access' => $parts[1] ?? ''
                ];
            }),
        ];

        return view('cms.page.role.update', $data);
    }

    public function update(Request $request, Role $role)
    {
        Gate::authorize('update', $role);
        if(!$role) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        if($role->name == 'Administrator') {
            $notify = NotifyHelper::errorOccurred('Role Administrator tidak dapat diubah.');
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permission' => 'required|array',
        ]);
        
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->route('cms.role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        Gate::authorize('delete', $role);
        if(!$role) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        if($role->users()->count() > 0) {
            $notify = NotifyHelper::errorOccurred('Role tidak dapat dihapus karena masih digunakan oleh pengguna.');
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        if($role->name == 'Administrator') {
            $notify = NotifyHelper::errorOccurred('Role Administrator tidak dapat dihapus.');
            return redirect()->route('cms.role.index')->with('notify', $notify);
        }

        $role->delete();

        return redirect()->route('cms.role.index')->with('success', 'Role deleted successfully.');
    }

    

}
