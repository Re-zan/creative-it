<?php

namespace App\Models;

use App\Models\Courseleed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function leeds()
    {
        return $this->hasMany(Courseleed::class);
    }
}
