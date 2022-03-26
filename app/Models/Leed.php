<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leed extends Model
{
    use HasFactory;

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
