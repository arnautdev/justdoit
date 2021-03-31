<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use App\Traits\UtilsTrait;
use App\Utilities\FilterBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory,
        SoftDeletes,
        UserIdFilterTrait,
        UtilsTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'isDone',
        'startDate',
        'endDate',
        'userId',
    ];

    /**
     * Get goal progress percent
     * @return number
     */
    public function getGoalProgressPercent(): float
    {
        $dateLabels = $this->createLabels([
            'from' => $this->startDate,
            'to' => $this->endDate
        ], 'l');
        $dateLabels = array_count_values($dateLabels);

        $goalAction = $this->goalAction()->firstOrNew([], []);
        if (!$goalAction->exists) {
            return 0;
        }
        $goalActionWeekDays = $goalAction->getWeekDaysNames();

        $totalGoalActionCount = 0;
        foreach ($goalActionWeekDays as $goalActionWeekDay) {
            if (isset($dateLabels[$goalActionWeekDay])) {
                $totalGoalActionCount += $dateLabels[$goalActionWeekDay];
            }
        }

        $addedGoalActionsCount = $this->getAddedGoalActionsCount($goalAction);

        $discount = 0;
        if ($addedGoalActionsCount > 0 && $totalGoalActionCount > 0) {
            $percent = ($addedGoalActionsCount / $totalGoalActionCount);
            $discount = ($percent * 100);
        }
        return number_format($discount, 2);
    }

    /**
     * @param GoalAction $goalAction
     * @return number
     */
    private function getAddedGoalActionsCount(GoalAction $goalAction): int
    {
        return TodoList::withoutGlobalScopes()
            ->where('isDone', '=', 'yes')
            ->where('goalActionId', '=', $goalAction->id)
            ->count();
    }

    /**
     * @return false|int
     */
    public function getOutstandingDays()
    {
        if ($this->endDate < date('Y-m-d')) {
            return 0;
        }

        $today = new Carbon();
        $diff = $today->diff($this->endDate);
        return $diff->days;
    }

    /**
     * @param $query
     * @param $filters
     */
    public function scopeFilterBy($query, $filters)
    {
        $namespace = basename(self::class);
        $namespace = str_replace('Models', 'Utilities', $namespace);
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply()->orderBy('id', 'DESC');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function goalAction()
    {
        return $this->hasOne(GoalAction::class, 'goalId', 'id');
    }
}
