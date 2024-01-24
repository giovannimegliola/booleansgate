<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'slug', 'category', 'type', 'weight', 'cost'];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
