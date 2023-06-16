@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Exam Schedule</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Iterate over each exam -->
                    @foreach ($exams as $exam)
                        <tr>
                            <td>{{ $exam->exam_name }}</td>
                            <td>{{ $exam->department }}</td>

                            <td>
                                <a href="{{ route('download.schedule', $exam->exam_name) }}" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></a>
                                <a href="{{ route('publish.schedule', $exam->exam_name) }}" class="btn btn-success">Publish</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection
