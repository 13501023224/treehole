<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
    protected $table='messages';
    protected $primaryKey="id";
    protected $fillable=[
        'user_id','content','likes'
    ];
    public  $timestamps=true;
}
