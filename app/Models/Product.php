<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['article', 'name', 'status', 'data'];

    protected $dates = ['deleted_at'];

    public function scopeAvailable($q)
    {
        $q->where('status', '=', 'available');
    }
}
