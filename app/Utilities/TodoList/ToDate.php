<?php


namespace App\Utilities\TodoList;


use App\Utilities\FilterContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ToDate implements FilterContract
{

    protected $query;

    /**
     * ToDate constructor.
     * @param Builder $query
     */
    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * @param $value
     * @throws \Exception
     */
    public function handle($value): void
    {
        $dates = explode(' - ', $value);
        $dateFrom = new Carbon($dates[0]);
        if (isset($dates[1])) {
            $dateTo = new Carbon($dates[1]);
        } else {
            $dateTo = new Carbon($dates[0]);
        }

        $this->query->whereBetween('toDate', [$dateFrom->startOfDay(), $dateTo->endOfDay()]);
    }
}
