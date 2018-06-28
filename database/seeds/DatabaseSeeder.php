<?php

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
       $agent1 =  \App\Agent::create([
            'name' => 'Agent 1' ,
            'phone' => '0664421311' ,
            'country' => 'Algeria' ,
            'email' => 'agent1@gmail.com'
        ]) ;
        $agent2 =  \App\Agent::create([
            'name' => 'Agent 2' ,
            'phone' => '0664421312' ,
            'country' => 'Algeria' ,
            'email' => 'agent2@gmail.com'
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
