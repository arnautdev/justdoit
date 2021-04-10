<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LifeCircle extends Model
{
    use HasFactory, SoftDeletes, UserIdFilterTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'userId',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lifeCirclePartition()
    {
        return $this->hasMany(LifeCirclePartition::class, 'lifeCircleId', 'id')
            ->orderBy('id', 'ASC');
    }
}
