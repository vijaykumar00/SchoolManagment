<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;
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
