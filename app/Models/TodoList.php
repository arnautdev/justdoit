<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'userId',
        'goalActionId',
        'toDate',
        'isDone',
        'title',
        'description'
    ];

    /**
     * @param $query
     * @param $filters
     */
    public static function scopeFilterBy($query, $filters)
    {
        $query->where('toDate', '=', date('Y-m-d'))
            ->orderBy('id', 'DESC');
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return ($this->isDone == 'yes');
    }
}
