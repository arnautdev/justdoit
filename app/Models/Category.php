<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'userId',
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
     * @param $request
     * @return mixed
     */
    public function getExpenses($request)
    {
        return Expenses::where('categoryId', '=', $this->id)->filterBy($request);
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function selectedOptions($filters = [])
    {
        return Category::filterBy($filters)
            ->get()
            ->pluck('title', 'id');
    }

}
