<?php


namespace App\Utilities\Goal;


use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class IsDone implements FilterContract
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * IsDone constructor.
     * @param Builder $query
     */
    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * @param $value
     */
    public function handle($value): void
    {
        if ($value != 'all') {
            $this->query->where('isDone', '=', $value);
        }
    }
}
