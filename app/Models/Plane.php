<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{    
    use HasFactory;

    // Optionally, you can specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'planes';
    protected $fillable = [
        'name',
        'path',
        'type',
        'brand', 
        'quantity', 
        'added_at'
    ];
}
