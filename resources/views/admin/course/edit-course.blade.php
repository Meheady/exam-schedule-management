@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Course</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow p-2">
                    <form method="post" action="{{route('update.course',$editData->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department Name</label>
                            <select class="form-control" name="department" id="">
                                <option selected disabled>Select Department</option>
                                @foreach($department as $item)
                                    <option {{ $item->id == $editData->department_id? 'selected':'' }} value="{{ $item->id }}">{{ $item->department_full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <input type="text" required class="form-control" value="{{ $editData->course_name }}" name="course_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Credit</label>
                            <input type="number" required class="form-control" value="{{ $editData->credit }}" name="credit">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
