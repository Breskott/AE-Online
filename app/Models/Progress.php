<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'car_id',
        'instructor_id',
        'student_id',
        'abastecimento',
        'valor',
        'hora_ini',
        'hora_fim',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'progress';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
