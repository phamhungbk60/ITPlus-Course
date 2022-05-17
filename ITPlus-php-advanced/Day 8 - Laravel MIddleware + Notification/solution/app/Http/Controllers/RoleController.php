<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\SendAssignRoleNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', [
            'roles' => $roles,
            'role' => new Role()
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::create($request->input());
        if ($role !== null) {
            return redirect()->action([RoleController::class, 'index']);
        }
        return view('roles.index', [
            'roles' => Role::all(),
            'role' => new Role()
        ]);
    }

    public function edit(Request $request, Role $role)
    {
        //return true on request
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        //return true on request
        if ($role->update($request->input())) {
            return redirect()->action([RoleController::class, 'index']);
        }
    }

    public function destroy(Role $role)
    {
        return $role->delete();
    }

    /**
     * Show view assign role to specific people
     *
     * @param Role $role
     * @return void
     */
    public function showAssignToPeopleForm(Role $role)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $usersBelongsToRole = $role->users->pluck('id')->toArray();
        return view('roles.assign', compact('role', 'users', 'usersBelongsToRole'));
    }

    /**
     * Assign role to user
     */
    public function assignToPeople(Request $request, Role $role)
    {
        $assignedUsersId = $request->input('users');
        //mass update: Update tất cả record có trong bảng users
        User::query()->update(['role_id' => null]);
        //Sử dụng whereIn để tiết kiệm truy vấn câu SQL
        $selectedUsers = User::whereIn('id', $assignedUsersId);
        $selectedUsers->update(['role_id' => $role->id]);
        foreach ($selectedUsers->get() as $user) {
            $user->notify(new SendAssignRoleNotification());
        }

        return redirect("/roles/{$role->id}/assign-to-people");
    }
}
