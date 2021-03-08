<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function tenants()
        {
            return $this->hasOne('App\Models\Tenant');
        }

}
