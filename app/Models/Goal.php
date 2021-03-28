<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'isDone',
        'startDate',
        'endDate',
        'userId',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function goalAction()
    {
        return $this->hasOne(GoalAction::class, 'goalId', 'id');
    }
}
