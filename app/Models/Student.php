<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'telefone',
        'celular',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'status_aula',
    ];

    protected $searchableFields = ['*'];

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}
