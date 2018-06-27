<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Agent;

class Tour extends Model
{
    //

    protected $fillable = [
        'agent_id', 'user_id', 'adr', 'processorName' , 'photographerName' , 'shotOn' , 'processorCompletedOn'
    ];


    public function agent(){
        return Agent::where('id',$this->agent_id) ;
    }
    public function user(){
        return User::where('id',$this->user_id) ;
    }
}
