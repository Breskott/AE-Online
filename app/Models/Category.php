<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['descricao', 'ativo'];

    protected $searchableFields = ['*'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
