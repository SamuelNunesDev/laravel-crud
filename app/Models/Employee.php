<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'funcionarios';
    protected $primaryKey = 'funcionario_id';
    protected $fillable = [
        'nome',
        'data_nascimento',
        'status',
        'deleted_at'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DESLIGADO = 0;
}
