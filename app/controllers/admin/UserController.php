<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, Sentry, View, DB, Input, Validator, User;

class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $users = User::orderBy('created_at', 'DESC')
            ->paginate(10);

        return View::make('backend.user.index', compact('users'))->with('active', 'user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'first-name'       => Input::get('first_name'),
            'last-name'        => Input::get('last_name'),
            'email'            => Input::get('email'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password')
        );

        $rules = array(
            'first-name'       => 'required|min:3',
            'last-name'        => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {

            return Redirect::action('App\Controllers\Admin\UserController@create')->withErrors($validation)->withInput();
        }

        $user = Sentry::createUser(array(
            'email'      => $formData['email'],
            'password'   => $formData['password'],
            'first_name' => $formData['first-name'],
            'last_name'  => $formData['last-name'],
            'activated'  => 1,
        ));

        $adminGroup = Sentry::findGroupById(1);
        $user->addGroup($adminGroup);

        return Redirect::action('App\Controllers\Admin\UserController@index')->with('message', 'User was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $user = Sentry::findUserById($id);
        return View::make('backend.user.show', compact('user'))->with('active', 'user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $user = Sentry::findUserById($id);
        return View::make('backend.user.edit', compact('user'))->with('active', 'user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $formData = array(
            'first-name' => Input::get('first_name'),
            'last-name'  => Input::get('last_name'),
            'email'      => Input::get('email'),
        );

        $user = Sentry::findUserById($id);
        $user->email = $formData['email'];
        $user->first_name = $formData['first-name'];
        $user->last_name = $formData['last-name'];
        $user->save();

        return Redirect::action('App\Controllers\Admin\UserController@index')->with('message', 'User was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $user = Sentry::findUserById($id);
        $user->delete();

        return Redirect::action('App\Controllers\Admin\UserController@index')->with('message', 'User was successfully deleted');
    }

    public function confirmDestroy($id) {

        $user = User::find($id);
        return View::make('backend.user.confirm-destroy', compact('user'))->with('active', 'user');
    }
}
