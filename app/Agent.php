<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tour;
class Agent extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'phone', 'country'
    ];


    public function tours(){
        return Tour::where('agent_id',$this->id) ;
    }
}
