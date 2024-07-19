<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\CarbonInterval;
use App\Models\Schedule;
use App\Jongman\Common\Date;

class ScheduleController extends Controller
{
    public function showSchedule(Request $request, $id, $date = null)
    {
        $schedule = Schedule::findOrFail($id);
        $startDate = $date ? Carbon::parse($date) : Carbon::now();
        $startDate = $startDate->startOfWeek();
        $endDate = $startDate->copy()->addDays($schedule->visible_days - 1);

        $dates = CarbonInterval::days(1)->toPeriod($startDate, $endDate);
        $prevWeek = $startDate->copy()->subWeek()->format('d-m-Y');
        $nextWeek = $startDate->copy()->addWeek()->format('d-m-Y');

        return view('schedule.show', compact('schedule', 'dates', 'prevWeek', 'nextWeek'));
    }

    


}
