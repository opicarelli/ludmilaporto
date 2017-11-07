<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        $albums = Album::all();
        return View::make('site.home')->with('albums', $albums);
    }

}
