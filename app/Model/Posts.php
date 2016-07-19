<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = ['user_id','title','content','image','youtube','views'];

    protected $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function bit()
    {
        return $this->hasMany('App\Model\Bit');
    }
}
