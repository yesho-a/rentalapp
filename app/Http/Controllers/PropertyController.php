<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Payment;
use Mail;
use App\Mail\Reminder;
//use Yajra\Datatables\Datatables;
use Datatables;
use DB;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::all();
        return view('property.index')->with('property',$property);
        //return $property;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = Property::pluck('propertyname','id');
        return view('property.create');
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['propertyname'=>'required|unique:property,propertyname','location'=>'required','amount'=>'required'
        ]);
 
 
         $property = new Property;
         $property->propertyname=$request->input('propertyname');
         $property->location=$request->input('location');
         $property->amount=$request->input('amount');
         $property->save();
         //return redirect('/property')->with('success','Property Added');
         return redirect('property/create')->with('success','Property Added');
 
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        return view('property.show')->with('property',$property);
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $property = Property::find($id);
        /*if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','unauthorised page');  

        }*/
        return view('property.edit')->with('property',$property);  
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['propertyname'=>'required','location'=>'required','amount'=>'required'
        ]);
        $property = Property::find($id);

        $property->propertyname=$request->input('propertyname');
        $property->location=$request->input('location');
        $property->amount=$request->input('amount');
        $property->save();
        return redirect('/property')->with('success','Property Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect('/property')->with('success','Tenant Removed');

    }
}
