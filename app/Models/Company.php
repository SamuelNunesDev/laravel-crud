<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empresas';
    protected $primaryKey = 'empresa_id';
    protected $fillable = [
        'nome',
        'status',
        'deleted_at'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
}
