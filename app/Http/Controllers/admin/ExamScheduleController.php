<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Department;
use App\Models\ExamSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamScheduleController extends Controller
{
    public function examSchedule()
    {
        $batchs = Batch::latest()->get();
        $course = Course::latest()->get();
        $department = Department::latest()->get();
        $schedules = ExamSchedule::select('batch', 'date', 'time', 'subject')->orderBy('batch')->get();

        // Group the schedules by batch for displaying in the table
        $scheduleByBatch = $schedules->groupBy('batch')->toArray();

        // Get the unique dates and times
        $uniqueDatesTimes = $schedules->unique('date')->sortBy('date')->pluck('date');

        $exams = ExamSchedule::distinct('exam_name')->pluck('exam_name');

        return view('admin.exam-schedule.index',compact('department','batchs','exams','course','schedules','uniqueDatesTimes','scheduleByBatch'));
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

    public function downloadSchedule($exam)
    {
        $schedules = ExamSchedule::select('batch', 'date', 'time', 'subject')->where('exam_name',$exam)->orderBy('batch')->get();
        // Group the schedules by batch for displaying in the table
        $scheduleByBatch = $schedules->groupBy('batch')->toArray();
        // Get the unique dates and times
        $uniqueDatesTimes = $schedules->unique('date')->sortBy('date')->pluck('date');

        $firstRow = ExamSchedule::select('exam_name')->where('exam_name',$exam)->orderBy('batch')->first();

        $formattedDate = Carbon::parse($firstRow->date)->year;

        $fileName = $firstRow->exam_name.'-'.$formattedDate;

        $pdf = Pdf::loadView('admin.exam-schedule.download',compact('formattedDate','scheduleByBatch','schedules','firstRow'))
            ->setPaper('a4',)->setOption([
                'tempDir'=> public_path(),
                'chroot'=> public_path(),
            ]);
        return $pdf->download($fileName.'.pdf');
    }

    public function subjectAjax($id)
    {
        $subject = Course::where('department_id',$id)->latest()->get();
        return response()->json($subject);
    }
}
