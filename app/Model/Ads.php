<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    //
    protected $table = 'ads';

    protected $fillable = ['user_id','views','hits','title','content','url','image'];

    protected $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function bit()
    {
        return $this->belongsTo('App\Model\Bit');
    }
}
