<?php

class Album extends Eloquent {

    protected $table = 'albums';

    public function content()
    {
        return nl2br($this->content);
    }

    public function owner()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function pictures()
    {
        return $this->hasMany('Picture');
    }

    public function videos()
    {
        return $this->hasMany('Video');
    }
}
