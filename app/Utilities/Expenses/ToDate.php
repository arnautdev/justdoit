<?php


namespace App\Utilities\Expenses;


use App\Traits\UtilsTrait;
use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class ToDate implements FilterContract
{
    use UtilsTrait;

    /**
     * @var Builder
     */
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
     */
    public function handle($value): void
    {
        $dates = explode(' - ', $value);
        $dateFrom = $this->sqlDate($dates[0])->format('Y-m-d H:i:s');
        $dateTo = $this->sqlDate($dates[1])->format('Y-m-d H:i:s');

        $this->query->whereBetween('toDate', [$dateFrom, $dateTo]);
    }
}
