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

        return view('dashboard.tours.list',[
            'list'=> Tour::all(),
            'active'=>'Tours',
            'title'=> "V360PRO"
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
        // create aTour
        $rules = [
            'agent_id' => 'required',
            'adr' => 'required',

        ];

        $this->validate($request, $rules);
        //dd('aee');
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
        if (!$tour) abort(404);
        // show show form
        return view('dashboard.tours.show',[
            'active'=>'Tours',
            'title'=> "Show V360PRO",
            'model' => $tour
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
        $tour =  Tour::find($id) ;
        // show edit form
        return view('dashboard.tours.edit',[
            'active'=>'Tours',
            'title'=> "Edit V360PRO",
            'model' => $tour
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

        $rules = [
            'agent_id' => 'required',
            'adr' => 'required',

        ];

        $this->validate($request, $rules);

        Tour::find($id)->update([
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
    public function updateTour(Request $request, $id)
    {


       // dd($request) ;

        $rules = [
            'agent_id' => 'required',

        ];

        $this->validate($request, $rules);

        $agent = Agent::find($request->get('agent_id')) ;


        if ($request->has('agent_name')) $agent->name = $request->get('agent_name') ;
        if ($request->has('agent_phone')) $agent->phone = $request->get('agent_phone') ;
        if ($request->has('agent_email')) $agent->email = $request->get('agent_email') ;
        $agent->update() ;

       $tour = Tour::find($id) ;

            $tour->agent_id = $request->get('agent_id') ;
            $tour->shot_on = $request->get('shotOn') ;
            $tour->photographer_name = $request->get('photographerName') ;
            $tour->processor_completed_on = $request->get('processorCompletedOn') ;
            $tour->processor_name = $request->get('processorName') ;
            $tour->link = $request->get('link') ;
            $tour->embed_code = $request->get('embedCode') ;
            $tour->user_id = Auth::user()->id ;
            //dd($tour) ;
        if($tour->agent_id && $tour->shot_on && $tour->photographer_name &&  $tour->processor_name &&  $tour->link
            && $tour->agent_id  &&  $agent->name &&  $agent->phone &&  $agent->email ){
            $tour->state = "Complete" ;
        }

          if($tour->link) $tour->embed_code = "fill";

            $tour->update();


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
