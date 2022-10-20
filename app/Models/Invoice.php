<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\DetailInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function detailinvoices(){
        return $this->hasMany(DetailInvoice::class);
    }
}
