<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
