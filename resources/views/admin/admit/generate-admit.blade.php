@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admit Card Generate</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow p-2">
                    <form method="post" action="{{route('store.admit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Student</label>
                            <select class="form-control" name="student" id="">
                                <option selected disabled>Select Student</option>
                                @foreach($student as $item)
                                    <option value="{{ $item->id }}">{{ $item->student_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Exam Name</label>
                            <input type="text" required class="form-control" name="exam_name">
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
                            <th>Exam Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student->name }}</td>
                                <td>{{ $item->exam_type }}</td>
                                <td>
                                    <a href="{{ route('delete.admit',$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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

