<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'placa',
        'km',
        'cor',
        'marca',
        'modelo',
        'ano',
        'category_id',
    ];

    protected $searchableFields = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}
