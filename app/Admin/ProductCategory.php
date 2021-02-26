<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
