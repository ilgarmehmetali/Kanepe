<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	//

	public function category() {
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id'); //foreign key pages tablosunda
	}
}
