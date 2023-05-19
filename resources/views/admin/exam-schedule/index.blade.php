@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Exam Schedule Generate</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow p-2">
                    <form method="POST" action="{{ route('date-range') }}">
                        @csrf

                        <div class="from-group row mb-2">
                            <label for="start_date" class="col-form-label col-md-5">Start Date:</label>
                            <div class="col-md-7">
                                <input type="date" id="start_date" class="form-control" name="start_date">
                            </div>

                        </div>

                        <div class="from-group row mb-2">
                            <label for="end_date" class="col-form-label col-md-5">End Date:</label>
                            <div class="col-md-7">
                                <input type="date" id="end_date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="from-group row mb-2">
                            <label for="target_days" class="col-form-label col-md-5">Target Days:</label>
                            <div class="col-md-7">
                                <select id="target_days" class="form-control" name="target_days[]" multiple>
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="from-group row">
                            <label for="target_days" class="col-form-label col-md-5"></label>
                            <div class="col-md-7">
                                <button class="btn btn-success mt-2">Get Date</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <form id="scheduleForm" action="{{ url('/schedule') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="exam_name" class="col-form-label col-md-3">Exam Name:</label>
                                <div class="col-md-7">
                                    <input type="text" name="exam_name" id="exam_name" class="form-control" required>
                                </div>
                            </div>

                            <div id="additionalFields">
                                <div class="schedule-group">
                                    <div class="form-group row">
                                        <label for="batch" class="col-form-label col-md-3">Batch:</label>
                                        <div class="col-md-7">
                                            <select name="batch[]" class="form-control" id="">
                                                @foreach($batchs as $item)
                                                    <option value="{{ $item->batch_name }}">{{ $item->batch_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-md-3">Date:</label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="date[]" id="">
                                                @if(Session::has('dateRange'))
                                                    @foreach(session('dateRange') as $item)
                                                        @php
                                                            $formattedDate = date('d-m-Y', strtotime($item['date']));
                                                        @endphp
                                                        <option value="{{ $item['date'] }}">{{ $formattedDate }} -> {{ $item['dayName'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="time" class="col-form-label col-md-3">Time:</label>
                                        <div class="col-md-7">
                                            <input type="time" name="time[]" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subject" class="col-form-label col-md-3">Subject:</label>
                                        <div class="col-md-7">
                                            <select name="subject[]" class="form-control" id="">
                                                @foreach($course as $item)
                                                    <option value="{{ $item->course_name }}">{{ $item->course_name }}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Schedule</button>
                            <button type="button" id="addMore" class="btn btn-secondary">Add More</button>
                            <button type="button" id="removeLast" class="btn btn-danger">Remove Last</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Batch</th>
                        <th>Date / Time</th>
                        <th>Subject</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Iterate over each batch -->
                    @foreach ($scheduleByBatch as $batch => $schedule)
                        <tr>
                            <td rowspan="{{ count($schedule) }}">{{ $batch }}</td>
                            <!-- Iterate over each schedule entry -->
                            @foreach ($schedule as $index => $exam)
                                <td>
                                    {{ $exam['date'] }} - {{ $exam['time'] }}
                                </td>
                                <td>
                                    {{ $exam['subject'] }}
                                </td>
                        </tr>
                        <!-- Add new row for subsequent entries -->
                        @if ($index + 1 < count($schedule))
                            <tr>
                        @endif
                    @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add more fields
            $('#addMore').click(function() {
                var html = `
    <hr>
    <div class="schedule-group">
        <div class="form-group row">
            <label for="batch" class="col-form-label col-md-3">Batch:</label>
            <div class="col-md-7">
                <select name="batch[]" class="form-control" id="">
                    @foreach($batchs as $item)
                <option value="{{ $item->batch_name }}">{{ $item->batch_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-form-label col-md-3">Date:</label>
            <div class="col-md-7">
                <select class="form-control" name="date[]" id="">
                    @if(Session::has('dateRange'))
                @foreach(session('dateRange') as $item)
                @php
                    $formattedDate = date('d-m-Y', strtotime($item['date']));
                @endphp
                <option value="{{ $item['date'] }}">{{ $formattedDate }} -> {{ $item['dayName'] }}</option>
                    @endforeach
                @endif
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="time" class="col-form-label col-md-3">Time:</label>
            <div class="col-md-7">
                <input type="time" name="time[]" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="subject" class="col-form-label col-md-3">Subject:</label>
            <div class="col-md-7">
                <select name="subject[]" class="form-control" id="">
                    @foreach($course as $item)
                <option value="{{ $item->course_name }}">{{ $item->course_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
`;

                $('#additionalFields').append(html);
            });

            // Remove last fields
            $('#removeLast').click(function() {
                var groups = $('.schedule-group');
                if (groups.length > 1) {
                    groups.last().remove();
                }
            });
        });
    </script>
@endsection


