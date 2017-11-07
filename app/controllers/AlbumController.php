<?php

class AlbumController extends BaseController {

    protected $layout = "site.layouts.album";

    protected $album;

    public function getView($slug)
    {
        $album = Album::where('slug', '=', $slug)->firstOrFail();

        if (is_null($album))
        {
            return App::abort(404);
        }

        if ($album->type == "PICTURE") {

            $pictures = $album->pictures()->get();
            return View::make('site/album/view_album_pictures', compact('album', 'pictures'));

        } else if ($album->type == "VIDEO") {

            $videos = $album->videos()->get();
            return View::make('site/album/view_album_videos', compact('album', 'videos'));

        }

        return App::abort(404);
    }

}
