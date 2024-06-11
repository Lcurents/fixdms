<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plant extends Model
{
    use HasFactory;
    protected $table = 'plant';
    protected $fillable = [
        'nama_plant',
        'department',
    ];
}
