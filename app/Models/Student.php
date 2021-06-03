<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = [ 'name','age','gender','teacher_id'];
    /**
     * Get the teacher associated with the student.
     */
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher','teacher_id');
    }
    /**
     * Get the marks associated with the student.
     */
    public function marks()
    {
        return $this->hasOne('App\Models\Marks', 'id', 'student_id');
    }
}
