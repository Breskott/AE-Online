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

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = $this->numericMaskRemove($value);
    }

    public function getValorAttribute($value)
    {
        return $value;
    }

    public function getValorFormatedAttribute()
    {
        return number_format($this->valor, 2, ',', '.');
    }

    private function numericMaskRemove($num) {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }

        return floatval(
            preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
            preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
        );
    }

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
