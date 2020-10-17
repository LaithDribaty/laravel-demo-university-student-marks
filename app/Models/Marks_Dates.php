<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks_Dates extends Model
{
    use HasFactory;
    protected $table = 'marks_date';
    protected $primaryKey = 'id';
}
