<?php

class AdminProfileController extends AdminController {

    public function getShow()
    {
        $user = Auth::user();
        $title = Lang::get('app.title_admin_users_profile_edit');
        return View::make('admin/profile/index', compact('title', 'user'));
    }

    public function postEdit()
    {
        $user = Auth::user();
        // TODO: validate
        $user->name = Input::get('name');
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->birthdate = date('Y-m-d', strtotime(Input::get('birthdate')));
        $user->save();

        return Redirect::to('admin/dashboard');
    }

}