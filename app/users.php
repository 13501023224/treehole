<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table='tree_hole_users';
    protected $primaryKey="id";
    protected $fillable=[
        'username','phone','password','face_url'
    ];
    public  $timestamps=true;
}
