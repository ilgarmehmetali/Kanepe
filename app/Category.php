<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//

	public function posts() {
		return $this->hasMany('App\Post', 'category_id'); // foreign key bu tabloda değil, app\page tablosunda
	}
}
