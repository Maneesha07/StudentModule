<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $table = "marks";
    protected $fillable = [ 'student_id','mark_in_maths','mark_in_science','mark_in_history','terms'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
