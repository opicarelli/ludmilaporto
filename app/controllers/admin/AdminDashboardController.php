<?php

class AdminDashboardController extends AdminController {

    public function getIndex()
    {
        return View::make ( 'admin/dashboard' );
    }
}