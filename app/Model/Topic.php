<?php

namespace App\Model;

use App\Model\Content;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function contents() {
    	return $this->hasMany(Content::class);
    } 
}
