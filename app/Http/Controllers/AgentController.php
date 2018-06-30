<?php

namespace App\Http\Controllers;

use App\Agent;
use http\Env\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class AgentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'phone' => 'required|unique:agents',
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',

        ];

        $this->validate($request, $rules);
        Agent::create([
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
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
    public function show($id)
    {
        $agent = Agent::find($id) ;
        if (!$agent) abort(404);
        return \response()->json([
            'agent' => $agent
        ],200) ;
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
