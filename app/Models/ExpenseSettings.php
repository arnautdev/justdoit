<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use App\Traits\UtilsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseSettings extends Model
{
    use HasFactory,
        SoftDeletes,
        UtilsTrait,
        UserIdFilterTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'userId',
        'categoryId',
        'amount',
        'isMonthly',
        'showOnDashboard',
    ];

    /**
     * @param $filters
     * @param $query
     */
    public function scopeFilterBy($query, $filters)
    {
        return $query->orderBy('id', 'DESC');
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id')->firstOrNew([], []);
    }

    /**
     * Get user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(Client::class, 'userId', 'id');
    }
}
