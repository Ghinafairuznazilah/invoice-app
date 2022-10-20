<?php

namespace App\Models;

use App\Models\ItemType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function itemtypes(){
        return $this->belongsTo(ItemType::class);
    }
}
