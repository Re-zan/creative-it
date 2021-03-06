<?php

namespace App\Models;

use App\Models\Leed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seminar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function leeds()
    {
        return $this->hasMany(Leed::class);
    }
}
