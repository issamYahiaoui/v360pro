<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Tour;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class AgentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('customer')->except(['myTours','myTour','updateAgent','updateProfil', 'showAgent']);



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.agents.list',[
            'list'=> Agent::all(),
            'active'=>'agents',
            'title'=> "Agents",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show add form
            return view('dashboard.agents.add',[
                'active'=>'agents',
                'title'=> "Add User",
            ]);
    }

    public function myTours(){

        $agent = Agent::where('user_id' , Auth::user()->id)->first() ;
        if (!$agent) abort(404) ;
        return view('dashboard.agents.tours',[
            'list'=> Tour::where('agent_id',$agent->id)->get(),
            'active'=>'agents',
            'title'=> "Tours",
        ]) ;
    }
    public function myTour($id){

        return view('dashboard.agents.show',[
            'model'=> Tour::find($id),
            'active'=>'agents',
            'title'=> "Tours",
        ]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'phone' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'password' => 'required',


        ];

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'first_login' => 1,
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('password')),
        ]) ;

        $this->validate($request, $rules);
        Agent::create([
            'user_id' => $user->id,
            'country' => $request->get('country'),

        ]);

        Session::Flash('success', "Operation has successfully finished");

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function updateAgent($id){
        $agent = Agent::find($id) ;
        if (!$agent) abort(404);
        return view('dashboard.agents.edit',[
            'model' => $agent ,
            'active'=>'agents',
            'title'=> "Edit Agent",
        ]) ;
    }
    public function show($id)
    {
        $agent = Agent::find($id) ;
        if (!$agent) abort(404);
        return \response()->json([
            'agent' => $agent
        ],200) ;
    }
    public function showAgent()
    {
        $agent = Agent::where('user_id',Auth::user()->id)->first() ;
        if (!$agent) abort(404);
        return view('dashboard.agents.profile',[
            'model' => $agent ,
            'active'=>'agents',
            'title'=> "Edit Profile",
        ]) ;
    }
    public function updateProfil(Request $request, $id)
    {


        $rules = [
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'password' => 'confirmed'

        ];

        $user = User::find($request->get('user_id')) ;

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('password')),
        ]) ;


        $this->validate($request, $rules);
        Agent::find($id)->create([
            'user_id' => $user->id,
            'country' => $request->get('country'),

        ]);

        Session::Flash('success', "Operation has successfully finished");

        return Redirect::back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'phone' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'user_id' => 'required',

        ];

        $user = User::find($request->get('user_id'))->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]) ;

        $this->validate($request, $rules);
        Agent::find($id)->create([
            'user_id' => $user->id,
            'country' => $request->get('country'),

        ]);

        Session::Flash('success', "Operation has successfully finished");

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Agent::find($id)->delete() ;

        return Redirect::back();
    }
}
