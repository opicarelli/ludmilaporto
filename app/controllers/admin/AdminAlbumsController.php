<?php

class AdminAlbumsController extends AdminController {

    protected $album;

    public function __construct(Album $album)
    {
        parent::__construct();
        $this->album = $album;
    }

    public function getIndex()
    {
        $title = Lang::get('app.title_admin_albums');
        $albums = Album::all();
        return View::make('admin/albums/index', compact('title', 'albums'));
    }

    public function getCreate()
    {
        $title = Lang::get('app.title_admin_albums_create');
        return View::make('admin/albums/create_edit', compact('title'));
    }

    public function postCreate()
    {

        $rules = array(
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255',
            'image'   => 'required',
            'type'   => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $user = Auth::user();

            $file = Input::file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $destinationPath = public_path() . '/uploads/images/album/';
            $file->move($destinationPath, $filename);

            $this->album->title            = Input::get('title');
            $this->album->slug             = Str::slug(Input::get('title'));
            $this->album->content          = Input::get('content');
            $this->album->image_src        = $filename;
            $this->album->type             = Input::get('type');
            if ($this->album->type == "LINK") {
                $this->album->link         = Input::get('link');
            } else {
                $this->album->link         = null;
            }
            $this->album->user_id          = $user->id;

            if($this->album->save())
            {
                // Success
                return Redirect::to('admin/albums/' . $this->album->id . '/edit')->with('success', Lang::get('app.form_admin_albums_create_message_success'));
            }

            // Error database
            return Redirect::to('admin/albums/create')->with('error', Lang::get('app.form_admin_albums_create_message_error'));
        }

        // Validator errors
        return Redirect::to('admin/albums/create')->withInput()->withErrors($validator);
    }

    public function getShow($album)
    {
        // TODO: redirect to the frontend
    }

    public function getEdit($album)
    {
        $title = Lang::get('app.title_admin_albums_edit');
        return View::make('admin/albums/create_edit', compact('title', 'album'));
    }

    public function postEdit($album)
    {

        $rules = array(
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255',
            'type'   => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            // Update the blog post data
            $album->title            = Input::get('title');
            $album->slug             = Str::slug(Input::get('title'));
            $album->content          = Input::get('content');
            $album->type             = Input::get('type');
            if ($album->type == "LINK") {
                $album->link         = Input::get('link');
            } else {
                $album->link         = null;
            }

            if($album->save())
            {
                // Success
                return Redirect::to('admin/albums/' . $album->id . '/edit')->with('success', Lang::get('app.form_admin_albums_edit_message_success'));
            }

            // Error database
            return Redirect::to('admin/albums/' . $album->id . '/edit')->with('error', Lang::get('app.form_admin_albums_edit_message_error'));
        }

        // Validator errors
        return Redirect::to('admin/albums/' . $album->id . '/edit')->withInput()->withErrors($validator);
    }

    public function getUploadPictures($album)
    {
        $title = Lang::get('app.title_admin_albums_pictures');
        return View::make('admin/albums/pictures', compact('title', 'album'));
    }

    public function postUploadPictures($album)
    {

        // TODO: Create validation rules

        $files = Input::file('file');
        $descriptions = Input::get('description');

        for($i = 0; $i < count($files); ++$i) {
            $file = $files[$i];
            $description = $descriptions[$i];

            $filename = time() . "_" . $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/images/album/picture/';
            $file->move($destinationPath, $filename);

            $thumb = Image::make($destinationPath . $filename);
            $thumb->crop(150, 150)->save($destinationPath . 'thumb_' . $filename);

            $picture = new Picture;
            $picture->album_id = $album->id;
            $picture->description = empty($description) ? null : $description;
            $picture->image_src = $filename;
            $picture->thumb_src = 'thumb_' . $filename;
            $picture->save();
        }

        return Redirect::to('admin/albums/' . $album->id . '/pictures');
    }

    public function getDeletePicture($album, $picture)
    {
        $destinationPath = public_path() . '/uploads/images/album/picture/';
        File::delete($destinationPath . '/' .$picture->image_src);
        File::delete($destinationPath . '/' .$picture->thumb_src);
        $picture->delete();
        return Redirect::to('admin/albums/' . $album->id . '/pictures');
    }

    public function getVideos($album)
    {
        $title = Lang::get('app.title_admin_albums_videos');
        return View::make('admin/albums/videos', compact('title', 'album'));
    }

    public function postVideos($album)
    {

        // TODO: Create validation rules
        $rules = array(
            'link' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {

            $video = new Video;
            $video->album_id = $album->id;
            $video->description = Input::get('description');;
            $video->link = Input::get('link');

            if($video->save())
            {
                // Success
                return Redirect::to('admin/albums/' . $album->id . '/videos')->with('success', Lang::get('app.form_admin_albums_manage_videos_message_success'));
            }

            // Error database
            return Redirect::to('admin/albums/' . $album->id . '/videos')->with('error', Lang::get('app.form_admin_albums_manage_videos_message_error'));
        }

        // Validator errors
        return Redirect::to('admin/albums/' . $album->id . '/videos')->withInput()->withErrors($validator);
    }

    public function getDeleteVideo($album, $video)
    {
        $video->delete();
        return Redirect::to('admin/albums/' . $album->id . '/videos');
    }
}