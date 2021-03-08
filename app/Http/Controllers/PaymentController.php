<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::whereRaw('id IN (select MAX(id) FROM payments GROUP BY tenant_id)')->get();
       return view('payments.index')->with('payments',$payments);
        //return view('payments.index');
        //return $payments;
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getPaymentsList(Request $request)
    {
 

   $payments = Tenant::with('latestPayment','property','payments')->get();

   return  response()->json($payments);

    }

    public function ajax(Request $request)
    {
        $payments = Tenant::with('latestPayment')->get();
        return view('test', compact('payments'));
        //return $payments;
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['amount'=>'required','rent_from'=>'required','rent_to'=>'required'
        ]);
         $payments = new Payment;
         $payments->amount=$request->input('amount');
         $payments->rent_from=$request->input('rent_from');
         $payments->rent_to=$request->input('rent_to');
         $payments->tenant_id= $request->input('tenant_id');
         $payments->save();
         return redirect('/')->with('success','Payment successfully made');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $payments = Payment::find($id);
        return view('payment.show')->with('payments',$payments);
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::find($id);
        /*if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','unauthorised page');  

        }*/
        return view('payment.edit')->with('payments',$payments);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['amount'=>'required','rent_from'=>'required','rent_to'=>'required'
        ]);
        $payments = Payment::find($id);

        $payments->amount=$request->input('amount');
        $payments->rent_from=$request->input('rent_from');
        $payments->rent_to=$request->input('rent_to');
        $payments->save();
        return redirect('/payment')->with('success','Payment Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Payment::find($id);
      
        
        $payments->delete();
        return redirect('/payment')->with('success','Payment Deleted');

    }
}
