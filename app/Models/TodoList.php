<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use App\Utilities\FilterBuilder;
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
        if (!isset($filters['toDate'])) {
            $filters['toDate'] = date('Y-m-d') . ' - ' . date('Y-m-d H:i:s');
        }

        $namespace = basename(self::class);
        $namespace = str_replace('Models', 'Utilities', $namespace);
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply()->orderBy('id', 'DESC');
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return ($this->isDone == 'yes');
    }
}
