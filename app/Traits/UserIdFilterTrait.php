<?php


namespace App\Traits;


use App\Models\Scope\UserIdFilterScope;

trait UserIdFilterTrait
{
    /**
     *
     */
    protected static function bootUserIdFilterTrait()
    {
        static::creating(function ($row) {
            if (is_null($row->userId)) {
                $row->userId = auth()->id();
            }
        });

        static::saving(function ($row) {
            if (isset($row->amount)) {
                $row->amount = $row->floatToInt($row->amount);
            }
        });
    }


    /**
     * Add global scope
     */
    protected static function booted()
    {
        static::addGlobalScope(new UserIdFilterScope());
    }

}
