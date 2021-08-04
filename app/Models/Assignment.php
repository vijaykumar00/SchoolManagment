<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    public function subject()
    {
        return $this->hasOne('App\Model\Subject');
    }
    public function teacher()
    {
        return $this->hasOne('App\Model\Teacher');
    }
}
