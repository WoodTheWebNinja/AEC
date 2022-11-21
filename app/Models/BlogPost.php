<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
   // protected $table = 'autre nom';

    protected $fillable = [
        'title',
        'body',
        'user_id'
       
    ];
    public function blogHasUser(){
        return $this->hasOne('App\Models\Users', 'id', 'user_id');
    }


}
