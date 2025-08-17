<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Permission::class);
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
        
        return view('cms.page.permission.index', $data);
    }

    public function create()
    {
        Gate::authorize('create', Permission::class);
        return view('cms.page.permission.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Permission::class);
        $request->validate([
            'feature' => 'required|string|max:255',
            'access' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->feature . '.' . $request->access,
            'guard_name' => 'web',
        ];

        Permission::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.permission.index')->with($notify, $notify);
    }

    public function edit(Permission $permission)
    {
        Gate::authorize('update', $permission);
        if (!$permission) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.permission.index')->with('notify', $notify);
        }

        $permissionName = explode('.', $permission->name);
        $data = [
            'permission' => $permission,
            'feature' => $permissionName[0] ?? '',
            'access' => $permissionName[1] ?? '',
        ];

        return view('cms.page.permission.update', $data);
    }

    public function update(Request $request, Permission $permission)
    {
        Gate::authorize('update', $permission);
        if(!$permission) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.permission.index')->with('notify', $notify);
        }

        $request->validate([
            'feature' => 'required|string|max:255',
            'access' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->feature . '.' . $request->access
        ];

        $permission->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.permission.index')->with($notify, $notify);
    }

    public function destroy(Permission $permission)
    {
        Gate::authorize('delete', $permission);
        if(!$permission) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.permission.index')->with('notify', $notify);
        }

        if($permission->roles()->count() > 0) {
            $notify = NotifyHelper::errorOccurred('Permission masih digunakan oleh role lain.');
            return redirect()->route('cms.permission.index')->with('notify', $notify);
        }

        $permission->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.permission.index')->with('notify', $notify);
    }
}
