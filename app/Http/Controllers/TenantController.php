<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use PDF;
use Dompdf\Options;
use Mail;
use App\Mail\Reminder;
//use Yajra\DataTables;
//use Datatables;
//use Barryvdh\DomPDF\Facade as PDF;
//use Dompdf\Dompdf;



use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tenant = Tenant::all();
        return view('tenants.index')->with('tenant',$tenant);

    }

    public function simon()
    {
        /*$details = [
            'name'=>'Anan Simon',
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];*/

       /* $details = Tenant::findOrFail(5);


     Mail::to('yeshoanans@gmail.com')->send(new Reminder($details));

    return "E-mail has been sent Successfully"; */
        //return $details;
        
        $data["email"] = "sepkap123@gmail.com";
       $data["title"] = "From ItSolutionStuff.com";
       $data["body"] = "This is Demo";
       $tenant = Tenant::all();
  
        //$pdf = PDF::loadView('emails.test', $tenant);
        $pdf = PDF::loadView('emails.test',compact('tenant'))->setPaper('a4','landscape');

         // $pdf = PDF::loadView('emails.test',compact('data'));*/

       /* */
       /* $data =  Tenant::all();
        $pdf = PDF::loadView('emails.test',compact('data'));*/
        //Mail::send('emails.test', $data, function($message)use($data, $pdf)
        //Mail::send('emails.test', ['pdf'=>$pdf], function($message) use ($tenant,$pdf)
        Mail::send([], $data, function($message)use($data, $pdf)

 {
            $message->to('sepkap123@gmail.com', 'Yesho Simon')
                    ->subject('From Simon Yesho')
                    ->attachData($pdf->output(), "text.pdf");

                   // $message->to('test@test.test', 'Jon Doe')->subject('Welcome!');

                    //$message->attachData($data['pdf'], 'invoice.pdf');

        });
  
       // return $pdf->download('tenants.pdf');

       return redirect('/')->with('success','PDF emailed');

  

       
    
    }

    public function sendinvoice($id)
    {
       
        $data["email"] = "sepkap123@gmail.com";
       $data["title"] = "Invoice";
       $data["body"] = "This is your invoice";
       $tenant = Tenant::find($id);
       $pdf = PDF::loadView('invoice',compact('tenant'))->setPaper('a4','landscape');
 
       $pdf->setOptions(['dpi' => 150,'isRemoteEnabled' => true,'tempDir' => public_path(),
       'chroot'  => public_path(),]);

       //$pdf = PDF::loadView('invoice',compact('tenant'))->setPaper('a4','landscape');

 Mail::send([], $data, function($message)use($data, $pdf)

 {
            $message->to('sepkap123@gmail.com', 'Yesho Simon')
                    ->subject('From Simon Yesho')
                    ->attachData($pdf->output(), "text.pdf");

                       });
  

       return redirect('/')->with('success','PDF emailed');

  

  //return $tenant->property->propertyname;


    
    }



    public function invoice($id){
        $tenant = Tenant::find($id);

   $pdf = PDF::loadView('invoice',compact('tenant'))->setPaper('a4','landscape');
 
  $pdf->setOptions(['dpi' => 150,'isRemoteEnabled' => true,'tempDir' => public_path(),
  'chroot'  => public_path(),]);
  //dd($pdf);
       return $pdf->stream('invoice.pdf');

    }
    public function generatePDF()
    {
        
        $tenant =  Tenant::all();
        $pdf = PDF::loadView('tenants.test',compact('tenant'))->setPaper('a4','landscape');
  
        return $pdf->download('tenants.pdf');
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = Property::doesntHave('tenants')->pluck('propertyname','id');
        //$property = Property::all();
        return view('tenants.create',compact('property'));


        //return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','email'=>'required','phone'=>'required'
        ,'image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        
        else{
            $fileNameToStore='noimage.png';
        }
        $tenant = new Tenant;
        $tenant->name=$request->input('name');
        $tenant->email=$request->input('email');

        $tenant->phone=$request->input('phone');
       $tenant->property_id= $request->input('property_id');
        $tenant->image=$fileNameToStore;
        $tenant->user_id = auth()->user()->id;

        $tenant->save();
        return redirect('/tenant/create')->with('success','Tenant Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);
    return view('tenants.show')->with('tenant',$tenant);
       // return view('tenants.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('tenants.edit')->with('tenant',$tenant);  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['name'=>'required','email'=>'required','phone'=>'required'
        ]);

        $tenant = Tenant::find($id);

        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/images/'.$tenant->image);

            
        }
     else {
        $fileNameToStore = 'noimage.jpg';
    }
     $tenant->name=$request->input('name');
     $tenant->email=$request->input('email');
     $tenant->phone=$request->input('phone');
     if($request->hasFile('image')){
        $tenant->image = $fileNameToStore;
    }
     $tenant->save();
    return redirect('/tenant')->with('success','Tenant Added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect('/tenant')->with('success','Tenant Removed');

    }
}
