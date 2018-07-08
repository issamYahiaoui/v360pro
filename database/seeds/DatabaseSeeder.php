<?php

use App\Agent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user =  \App\User::create([
            'name' => 'admin' ,
            'phone' => '0664421310' ,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456') ,
            'role' => 'superadmin'
        ]) ;
       $user1 =  \App\User::create([
            'name' => 'Agent 1' ,
            'phone' => '0664421311' ,
            'email' => 'agent1@gmail.com',
           'password' => bcrypt('ilovev360') ,
           'role' => 'customer'

       ]) ;
        $user2 =  \App\User::create([
            'name' => 'Agent 2' ,
            'phone' => '0664421312' ,
            'email' => 'agent2@gmail.com',
            'password' => bcrypt('ilovev360') ,
            'role' => 'customer'

        ]) ;
        $agent1 =  Agent::create([
            'user_id' => $user1->id ,
            'country' => 'Malaysia' ,
            'first_login' => 1 ,

        ]) ;
        $agent2 =  Agent::create([
            'user_id' => $user2->id ,
            'country' => 'Singapore' ,
            'first_login' => 1 ,

        ]) ;


        $tour1 =  \App\Tour::create([
            'agent_id' => $agent1->id ,
            'user_id' => $user->id ,
            'adr' => 'Algeria - Algiers' ,

        ]) ;
        $tour2 =  \App\Tour::create([
            'agent_id' => $agent2->id ,
            'user_id' => $user->id ,
            'adr' => 'France - Paris' ,

        ]) ;


    }
}
