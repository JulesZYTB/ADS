<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bit extends Model
{
    //
    protected $table = 'bitedition';

    protected $fillable = ['post_id','ad_id','edition'];

    protected $dates = ['created_at', 'updated_at'];

    public function post()
    {
        return $this->belongsTo('App\Model\Posts');
    }
    public function ads()
    {
        return $this->hasOne('App\Model\Ads');
    }
}
