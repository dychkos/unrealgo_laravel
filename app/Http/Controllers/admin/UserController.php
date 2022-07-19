<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use App\Services\MainService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    protected UserService $userService;

    public function __construct(UserService $userService, MainService $mainService)
    {
        parent::__construct($mainService);

        $this->modelName = "users";
        $this->userService = $userService;
    }

    public function editUser($user_id)
    {
        $user = User::find($user_id);
        $roles = Role::all();

        return $this->proccessView('admin.users.index', array(
                "user" => $user,
                "roles" => $roles
        ));
    }

    public function updateUser(Request $request, $user_id)
    {
        $role_id = $request->input('role_id');

        $updatedData = ['user_id' => $user_id, 'role_id' => $role_id];
        $this->userService->changeRole($updatedData);

        return redirect()->route("user.admin.index", "users")
            ->with("message", "Зміни збереженні");
    }

    public function toggleUserStatus($id): \Illuminate\Http\RedirectResponse
    {
        $status = $this->userService->toggleStatus($id);
        $message = $status ? "Розблоковано" : "Заблоковано";

        return redirect()->back()->with("message", $message);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUser($id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->delete($id);
        return redirect()->back();
    }
}
