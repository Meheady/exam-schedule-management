@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Student Registration</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow p-2">
                    <form method="post" action="{{route('store.registration') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Student Id</label>
                            <select class="form-control" name="student" id="">
                                <option selected disabled>Select Student</option>
                                @foreach($student as $item)
                                    <option value="{{ $item->id }}">{{ $item->student_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Semester</label>
                            <select class="form-control" name="semester" id="">
                                <option selected disabled>Select Semester</option>
                                @foreach($semester as $item)
                                    <option value="{{ $item->id }}">{{ $item->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Section</label>
                            <select class="form-control" required name="section" id="">
                                <option selected disabled>Select Section</option>
                                @foreach($section as $item)
                                    <option value="{{ $item->id }}">{{ $item->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Session Name</label>
                            <input type="text" required class="form-control" name="session">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject</label>
                            <select multiple class="form-control" name="subject[]" id="">
                                <option selected disabled>Select Subject</option>
                                @foreach($subject as $item)
                                    <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Student Name</th>
                            <th>Session</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student_id }}</td>
                                <td>{{ $item->session_id }}</td>
                                <td>
                                    <a href="{{ route('edit.course',$item->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('delete.course',$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
