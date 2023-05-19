<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\ExamSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamScheduleController extends Controller
{
    public function examSchedule()
    {
        $batchs = Batch::latest()->get();
        $course = Course::latest()->get();
        $schedules = ExamSchedule::select('batch', 'date', 'time', 'subject')->orderBy('batch')->get();

        // Group the schedules by batch for displaying in the table
        $scheduleByBatch = $schedules->groupBy('batch')->toArray();

        // Get the unique dates and times
        $uniqueDatesTimes = $schedules->unique('date')->sortBy('date')->pluck('date');


        return view('admin.exam-schedule.index',compact('batchs','course','schedules','uniqueDatesTimes','scheduleByBatch'));
    }
    public function dateRange(Request $request)
    {
        $startRange = $request->input('start_date');
        $endRange = $request->input('end_date');
        $targetDays = $request->input('target_days', []);

        $startDate = Carbon::parse($startRange);
        $endDate = Carbon::parse($endRange);

        $datesInRange = [];

        while ($startDate->lte($endDate)) {
            if (in_array($startDate->dayOfWeek, $targetDays)) {
                $date = $startDate->toDateString();
                $dayName = $startDate->format('l');
                $datesInRange[] = [
                    'date' => $date,
                    'dayName' => $dayName
                ];
            }

            $startDate->addDay();
        }
        Session::put('dateRange',$datesInRange);

        return redirect()->back();
    }

    public function schedule(Request $request)
    {

        $count = count($request->batch);

        for ($i= 0;$i < $count;$i++){
            ExamSchedule::create([
                'exam_name' => $request->exam_name,
                'batch' => $request->batch[$i],
                'date' => $request->date[$i],
                'time' => $request->time[$i],
                'subject' => $request->subject[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Schedule created successfully!');

    }
}
