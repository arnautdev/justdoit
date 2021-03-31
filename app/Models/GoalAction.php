<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoalAction extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait;


    /**
     * @var array
     */
    protected $fillable = [
        'goalId',
        'userId',
        'title',
        'description',
        'weekDays',
        'addToTodoList',
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::saving(function ($row) {
            $row->weekDays = implode(',', $row->weekDays);
        });
    }

    /**
     * @return mixed
     */
    public function checkIsAddToTodoList()
    {
        return ($this->addToTodoList);
    }

    /**
     * @return string
     */
    public function getWeekDaysNames(): array
    {
        $weekDaysNames = $this->getWeekDays();
        $this->weekDays = explode(',', $this->weekDays);
        $out = [];

        foreach ($this->weekDays as $weekDay) {
            $out[] = $weekDaysNames[$weekDay];
        }

        return $out;
    }

    /**
     * @return false|string[]
     */
    public function getRepeatWeekDays()
    {
        return explode(',', $this->weekDays);
    }

    /**
     * @return string[]
     */
    public function getWeekDays()
    {
        return [
            1 => 'Monday',
            2 => 'TuesDay',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];
    }

    /**
     * @return string
     */
    public function getRepeatOnLabel()
    {
        $repeatOn = explode(',', $this->weekDays);
        $weekDays = $this->getWeekDays();

        $cout = [];
        foreach ($repeatOn as $item) {
            if (isset($weekDays[$item])) {
                $cout[] = '<label class="label label-default">' . $weekDays[$item] . '</label>&nbsp;&nbsp;';
            }
        }

        return implode('', $cout);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goalId', 'id');
    }
}
