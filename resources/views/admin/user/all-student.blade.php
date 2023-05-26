@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Student</h1>
                        <a href="{{ route('create.student') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i>Add Student</a>
        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Batch</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Iterate over each exam -->
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($item->photo) }}" width="50px" height="50px" alt="student_image">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->batch }}</td>
                                <td>{{ $item->department }}</td>
                                <td>
                                    <span class="badge badge-pill {{ $item->status == 'active'?'bg-success':'bg-danger' }} text-white">{{ $item->status }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('update.student.status', $item->id) }}" class="btn text-white {{ $item->status == 'active'?'bg-danger':'bg-success' }}">{{ $item->status == 'active'?'Inactive':'Active' }}</a>
                                    <a href="{{ route('edit.student', $item->id) }}" class="btn text-white bg-info"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
