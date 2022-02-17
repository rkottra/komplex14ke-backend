<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csapat extends Model
{
    use HasFactory;
    
    protected $table = "csapatok";
    protected $primaryKey = "csapatID";

}
