<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function tenant(){
        return $this->belongsTo('App\Models\Tenant');
    }
   
}


