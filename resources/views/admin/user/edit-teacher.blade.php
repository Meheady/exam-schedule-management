@extends('admin.admin-master')

@section('admin-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Teacher</h1>
            <a href="{{ route('all.teacher') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-list fa-sm text-white-50"></i>All Teacher</a>
        </div>

        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card-body">
                    <form method="post" action="{{ route('update.teacher',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                            <img src="{{ asset($user->photo) }}" width="50px" height="50px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="status" name="department">
                                @foreach($department as $item)
                                    <option {{ $item->department_short_name == $user->department?'selected':'' }} value="{{ $item->department_short_name }}">{{ $item->department_short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address">{{ $user->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option {{ $user->status == 'active'?'selected':'' }} value="active">Active</option>
                                <option {{ $user->status == 'inactive'?'selected':'' }} value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

