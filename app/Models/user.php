<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{

    protected $table = 'user';
    protected $fillable = ['first_name','last_name','email','user_name','password','user_type','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];

    use HasFactory;



    public function enrollments()
    {
       
        return $this->hasMany('App\Models\enrollment','user_id','id');

    }
}
