<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Payment;
use Mail;
use App\Mail\Reminder;
//use Yajra\DataTables\DataTables;
use Yajra\Datatables\Datatables;


//use Datatables;






use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tenant = Tenant::paginate(20);
        return view('home')->with('tenant',$tenant);


    }

    public function prop()
    {
        $property = Property::all();
       return view('prop')->with('property',$property);
      // return $property;

    }
    

    public function sidebar()
    {
        return view('sidebar');


    }

    public function admin()
    {
        return view('admin');


    }

    public function compose()
    {
        return view('emails.compose');


    }

    public function inbox()
    {
        return view('emails.inbox');


    }

    public function read()
    {
        return view('emails.read');


    }

   

   

    public function data()
    {
        $tenant = Tenant::all();
        return view('data')->with('tenant',$tenant);

}


   

public function table()
{

return view('table');
//return $tenant;

}

}
   
    


