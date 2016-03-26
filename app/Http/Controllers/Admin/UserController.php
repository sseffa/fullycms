<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Flash;
use Redirect;
use Sentinel;
use Validator;
use Fully\Models\User;
use Fully\Models\Role;
use Illuminate\Http\Request;
use Fully\Http\Controllers\Controller;

/**
 * Class UserController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('backend.user.index', compact('users'))->with('active', 'user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id');

        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $formData = array(
            'first-name' => $request->get('first_name'),
            'last-name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'confirm-password' => $request->get('confirm_password'),
            'roles' => $request->get('roles'),
        );

        $rules = array(
            'first-name' => 'required|min:3',
            'last-name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'confirm-password' => 'required|same:password',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('Admin\UserController@create')->withErrors($validation)->withInput();
        }

        $user = Sentinel::registerAndActivate(array(
            'email' => $formData['email'],
            'password' => $formData['password'],
            'first_name' => $formData['first-name'],
            'last_name' => $formData['last-name'],
            'activated' => 1,
        ));

        if (isset($formData['roles'])) {
            foreach ($formData['roles'] as $role => $id) {
                $role = Sentinel::findRoleByName($role);
                $role->users()->attach($user);
            }
        }

        return Redirect::action('Admin\UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = Sentinel::findUserById($id);

        return view('backend.user.show', compact('user'))->with('active', 'user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = Sentinel::findUserById($id);

        $userRoles = $user->getRoles()->lists('name', 'id')->toArray();
        $roles = Role::lists('name', 'id');

        return view('backend.user.edit', compact('user', 'roles', 'userRoles'))->with('active', 'user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $formData = array(
            'first-name' => $request->get('first_name'),
            'last-name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => ($request->get('password')) ?: null,
            'confirm-password' => ($request->get('confirm_password')) ?: null,
            'roles' => $request->get('roles'),
        );

        if (!$formData['password'] || !$formData['confirm-password']) {
            unset($formData['password']);
            unset($formData['confirm_password']);
        }

        $rules = array(
            'first-name' => 'required|min:3',
            'last-name' => 'required|min:3',
            'email' => 'required',
            'password' => 'min:6',
            'confirm-password' => 'same:password',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }

        $user = Sentinel::findById($id);
        $user->email = $formData['email'];
        $user->first_name = $formData['first-name'];
        $user->last_name = $formData['last-name'];

        Sentinel::update($user, $formData);

        $oldRoles = $user->getRoles()->lists('name', 'id')->toArray();

        foreach ($oldRoles as $id => $role) {
            $roleModel = Sentinel::findRoleByName($role);
            $roleModel->users()->detach($user);
        }

        if (isset($formData['roles'])) {
            foreach ($formData['roles'] as $role => $id) {
                $role = Sentinel::findRoleByName($role);
                $role->users()->attach($user);
            }
        }

        return Redirect::route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = Sentinel::findById($id);
        $user->delete();

        Flash::message('User was successfully deleted');

        return langRedirectRoute('admin.user.index');
    }

    public function confirmDestroy($id)
    {
        $user = User::find($id);

        return view('backend.user.confirm-destroy', compact('user'))->with('active', 'user');
    }
}
