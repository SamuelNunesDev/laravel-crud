<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bond extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'vinculos';
    protected $primaryKey = 'vinculo_id';
    protected $fillable = [
        'funcionario_id',
        'cargo_id',
        'empresa_id',
        'status',
        'deleted_at'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    public function funcionario()
    {
        return $this->hasOne(Employee::class, 'funcionario_id', 'funcionario_id')->withTrashed();
    }
    
    public function cargo()
    {
        return $this->hasOne(Position::class, 'cargo_id', 'cargo_id')->withTrashed();
    }

    public function empresa()
    {
        return $this->hasOne(Company::class, 'empresa_id', 'empresa_id')->withTrashed();
    }
}
