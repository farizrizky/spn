<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Helpers\NotifyHelper;
use App\Helpers\SweetAlertHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);
        $data = [
            'user' => User::with('roles')->get(),
        ];
        return view('cms.page.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);
        $data = [
            'roles' => Role::all()
        ];
        return view('cms.page.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', User::class);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
        ]);

        $data = $request->only(['name', 'email', 'password']);
        $user = User::create($data);
        $user->assignRole($request->input('role'));

        return redirect()->route('cms.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', $user);
        if(!$user){
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.user.index')->with('notify', $notify);
        }
        $data = [
            'user' => $user,
            'roles' => Role::all()
        ];
        return view('cms.page.user.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);
        if(!$user) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.user.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required'
        ]);

        $data = $request->only(['name', 'email']);
        $user->update($data);
        $user->syncRoles($request->input('role'));

        return redirect()->route('cms.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);
        if(!$user) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.user.index')->with('notify', $notify);
        }

        $user->delete();

        return redirect()->route('cms.user.index');
    }

    public function profile(User $user){
        Gate::authorize('updateProfile', $user);
        $data = [
            'user' => $user
        ];
        return view('cms.page.user.update-profile', $data);
    }

    public function updateProfile(Request $request, User $user){
        Gate::authorize('updateProfile', $user);
        if(!$user) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.user.index')->with('notify', $notify);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $data = $request->only(['name', 'email']);
        $user->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.user.profile', $user->id)->with('notify', $notify);
    }

    public function changePassword(User $user){
        Gate::authorize('updatePassword', $user);
        $data = [
            'user' => $user
        ];
        return view('cms.page.user.update-password', $data);
    }

    public function updatePassword(Request $request, User $user){
        Gate::authorize('updatePassword', $user);
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            $notify = NotifyHelper::errorOccurred('Password lama tidak sesuai');
            return redirect()->back()->with('notify', $notify);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.user.password', $user->id)->with('notify', $notify);
    }

    public function resetPassword(User $user)
    {
        Gate::authorize('Kelola User', $user);
        $newPassword = Str::random(8);
        $user->password = Hash::make($newPassword);
        $user->save();

        $sweetalert = SweetAlertHelper::alert('success', 'Berhasil', 'Password berhasil direset. Password baru: ' . $newPassword);
        return redirect()->route('cms.user.edit', $user->id)->with('sweetalert', $sweetalert);
    }
}