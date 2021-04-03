<?php


namespace App\Traits;


use App\Utilities\FilterBuilder;

trait ModelFilterTrait
{
    /**
     * @param $query
     * @param $filters
     */
    public function scopeFilterBy($query, $filters)
    {
        if (method_exists($this, 'getDefaultFilters') && empty($filters)) {
            $defaultFilters = $this->getDefaultFilters();
            $filters = $defaultFilters;
        }

        $namespace = basename(self::class);
        $namespace = str_replace('Models', 'Utilities', $namespace);
        $filter = new FilterBuilder($query, $filters, $namespace);
        return $filter->apply()->orderBy('id', 'DESC');
    }
}
