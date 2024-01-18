<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
=======
    protected $fillable = ['name', 'desc'];
>>>>>>> dc8dd1d84a599e8797b4572a76eb8536258c4365
}
