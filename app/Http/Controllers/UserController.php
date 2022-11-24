<?php

namespace App\Http\Controllers;

use App\Events\DBConnectionError;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Only for authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List of users
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function usersGet(Request $request)
    {
        $users = User::all();

        return view('users/users')->with(array('users' => $users));
    }

    /**
     * create user GET request
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createUserGET(Request $request)
    {
        return view('users/createUser');
    }

    /**
     * create user POST request
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUserPOST(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $data = $request->all();
        User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/users')->with('success', 'Пользователь ' . $data['username'] . ' создан!');
    }

    /**
     * User page GET request
     * @param Request $request
     * @param int $userID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userPage(Request $request, int $userID)
    {
        $user = User::find($userID);

        return view('users/userPage')->with(array('user' => $user));
    }

    /**
     * Delete user POST request
     * @param Request $request
     * @param int $userID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteUser(Request $request, int $userID)
    {
        $user = User::find($userID);
        $user->delete();

        return redirect('/users');
    }

    /**
     * Change password POsT request
     * @param Request $request
     * @param int $userID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setPassword(Request $request, int $userID)
    {
        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user = User::find($userID);
        $data = $request->all();
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('/users/'.$userID)->with('success', 'Пароль пользователя '. $user->username .' изменен');
    }
}