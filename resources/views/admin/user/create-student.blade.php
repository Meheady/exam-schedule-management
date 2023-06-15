@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Student</h1>
            <a href="{{ route('all.student') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i>All Student</a>
        </div>

        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card-body">
                    <form method="post" action="{{ route('store.student') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="phone">Student ID</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <select class="form-control" id="status" name="batch">
                                @foreach($batch as $item)
                                    <option value="{{ $item->batch_name }}">{{ $item->batch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="status" name="department">
                                @foreach($department as $item)
                                <option value="{{ $item->department_short_name }}">{{ $item->department_short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select class="form-control" id="shift" name="shift">
                                <option value="Day">Day</option>
                                <option value="Evening">Evening</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

