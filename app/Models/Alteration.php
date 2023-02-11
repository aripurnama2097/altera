<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alteration extends Model
{
    use HasFactory;

    protected $table ='alterations';
    protected $guarded  =['id'];
}
