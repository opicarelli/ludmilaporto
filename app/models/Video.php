<?php

class Video extends Eloquent {

    protected $table = 'videos';

    public function album()
    {
        return $this->belongsTo('Album', 'album_id');
    }
}
