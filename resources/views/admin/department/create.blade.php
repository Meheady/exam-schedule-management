@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Department</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow p-2">
                    <form method="post" action="{{ route('store.department') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department Short Name</label>
                            <input type="text" required class="form-control" name="dep_short_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department Full Name</label>
                            <input type="text" required class="form-control" name="dep_full_name">
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
                            <th>Department Short Name</th>
                            <th>Department Full Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                       <tbody>
                       @foreach($allData as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->department_short_name }}</td>
                           <td>{{ $item->department_full_name }}</td>
                           <td>
                               <a href="{{ route('edit.department',$item->id) }}" class="btn btn-success">Edit</a>
                               <a href="{{ route('delete.department',$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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
