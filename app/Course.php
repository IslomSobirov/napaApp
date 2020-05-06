<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'teacherName', 'courseName', 'courseDuration',
        'coursePlan', 'courseResult', 'courseStart',
        'courseSpeciality', 'groupNumber', 'studentNumber'
    ];

    

}
