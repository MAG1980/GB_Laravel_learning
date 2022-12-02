<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function index(): View
    {
        //Получаем всех пользователей, исключая текущего, чтобы случайно не лишить его прав администратора
        $users = User::query()->where('id', '!=', Auth::id())->paginate(5);
        return view('admin.users.index', ['users' => $users]);
    }

    public function toggleAdminRights(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect(route('admin.users.index'))
                ->with('success', "Права администратора предоставлены успешно!");
        }
        return redirect(route('admin.users.index'))
            ->with('error', "Нельзя лишать активного пользователя прав администратора!");
    }

    public function destroy(User $user)
    {
        $userName = $user->name;
        if ($user->delete()) {
            return redirect(route('admin.users.index'))
                ->with("success", "Пользователь " . $userName ." удалён успешно!");
        }
    }
}
