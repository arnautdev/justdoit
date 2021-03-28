<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use App\Traits\UtilsTrait;
use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait,
        UtilsTrait;


    /**
     * @var array
     */
    protected $fillable = [
        'userId',
        'categoryId',
        'expenseSettingsId',
        'toDate',
        'amount',
        'title',
        'description',
    ];

    /**
     * @param $query
     * @param $filters
     * @return mixed
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Client::class, 'userId', 'id');
    }
}
