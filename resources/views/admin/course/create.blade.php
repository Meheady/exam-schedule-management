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
                    <form method="post" action="{{route('store.course') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department Name</label>
                            <select class="form-control" name="department" id="">
                                <option selected disabled>Select Department</option>
                                @foreach($department as $item)
                                    <option value="{{ $item->id }}">{{ $item->department_full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <input type="text" required class="form-control" name="course_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Credit</label>
                            <input type="number" required class="form-control" name="credit">
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
                            <th>Course Name</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                       <tbody>
                       @foreach($allData as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->course_name }}</td>
                           <td>{{ $item->credit }}</td>
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
