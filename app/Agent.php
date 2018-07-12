<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tour;
use App\User;
class Agent extends Model
{
    //
    protected $fillable = [
        'user_id', 'country' , 'first_login'
    ];


    public function tours(){
        return Tour::where('agent_id',$this->id)->get() ;
    }
    public function user(){
        return User::find($this->user_id) ;
    }
}
