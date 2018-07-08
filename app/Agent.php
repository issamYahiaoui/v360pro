<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tour;
use App\User;
class Agent extends Model
{
    //
    protected $fillable = [
        'user_id', 'country'
    ];


    public function tours(){
        return Tour::where('agent_id',$this->id) ;
    }
    public function user(){
        return User::find($this->user_id) ;
    }
}
