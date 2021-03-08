<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
     // use Sortable;
     protected $table = 'tenants';
     public $primaryKey = 'id';
     public $timestamps = true;
     protected $fillable = ['property_id'];
     protected $appends = ['tenants']; // to append to json
 
     public $sortable = ['id','name','email'];
 

    public function property()
    {
        return $this->belongsTo('App\Models\Property');

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /*public function payments(){
        return $this->hasMany('App\Models\Payment')->orderByDesc('created_at');
    }*/

    public function payments(){
        return $this->hasMany('App\Models\Payment')->orderByDesc('created_at');
    }
  
    public function latestPayment()
{
    return $this->hasOne(Payment::class)->latest();
   
}

public function getTenantsAttribute(){
    return $this->phone;
  }
  
}
