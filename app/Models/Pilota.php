<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilota extends Model
{
    use HasFactory;
    protected $table = "versenyzok";

    public $timestamps = false;

    public function csapat() {
        return $this->belongsTo(Csapat::class, 'csapat');
    }
}
