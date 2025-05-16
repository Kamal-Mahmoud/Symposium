<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function usersFavorited()
    {
        return $this->belongsToMany(User::class , 'favorites');
    }
    
}
