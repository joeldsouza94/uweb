<?php

namespace App\Model;

use App\Model\Topic;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $fillable = [
		'content','details'
	];
	
    public function topic() {
    	return $this->belongsTo(Topic::class);
    } 
}
