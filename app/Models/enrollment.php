<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment extends Model

{

    protected $table = 'enrollments';
    protected $fillable = ['user_id','user_name','creation_day','first_name','last_name','dob','phone_number','zipcode','apt_number','street','city','state','heart_probs','heart_rate','pace_maker','other_cardio_probs','height','weight','dr_name','dr_phone_number','dr_npi','medicare','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    use HasFactory;


    public function users()
    {
        return $this->belongsTo('App\Models\user','user_id','id');
    } 
    
}
