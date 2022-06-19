<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_code',
        'matric_no',
        'score',
        'grade'
    ];
    
    protected $table = 'results';
    protected $primaryKey = 'matric_no';

    //result belongs to a student
    public function csStudent()
    {
        return $this->belongsTo(User::class);
    }
}
