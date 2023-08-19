<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'qty',
        'basic_stock',
        'memo',
        'code',
        'item_img',
    ];
}
