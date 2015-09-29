<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Get the articles associated with the given tag.
	 * 
	 * @return \Illuminate\Database\Eloquent\Realations\BelongsToMany
	 */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
