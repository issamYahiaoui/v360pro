<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Tour;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class TourController extends Controller
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
        //show nationalities list
        return view('dashboard.tours.list',[
            'list'=> Tour::all(),
            'active'=>'Tours',
            'title'=> "V360 PRO"
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
        return view('dashboard.tours.add',[
            'active'=>'Tours',
            'title'=> "Add Tour",
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
        // create a nationality
        $rules = [
            'agent_id' => 'required',
            'adr' => 'required',

        ];

        $this->validate($request, $rules);
        Tour::create([
            'agent_id' => $request->get('agent_id'),
            'adr' => $request->get('adr'),
            'user_id' => auth()->user()->id,
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
        $tour =  Tour::find($id) ;
        // show show form
        return view('dashboard.tours.show',[
            'active'=>'Tours',
            'title'=> "Show V360 PRO",
            'tour' => $tour
        ]);
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
        // show edit form
        return view('dashboard.tours.edit',[
            'active'=>'Tours',
            'title'=> "Edit V360 PRO",
        ]);
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
        //update a nationality
        $rules = [
            'agent_id' => 'required',
            'adr' => 'required',

        ];

        $this->validate($request, $rules);

        Age::find($id)->update([
            'agent_id' => $request->get('agent_id'),
            'user_id' => Auth::user()->id,
            'shotOn' => $request->get('shotOn'),
            'photographerName' => $request->get('shotCompletedOn'),
            'processorCompletedOn' => $request->get('shotCompletedOn'),
            'processorName' => $request->get('shotCompletedOn'),
            'link' => $request->get('link'),
            'embedCode' => $request->get('embedCode'),



        ]);
        Session::Flash('success',"Operation has successfully finished");

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

        Tour::find($id)->delete() ;

        return Redirect::back();
    }
}
