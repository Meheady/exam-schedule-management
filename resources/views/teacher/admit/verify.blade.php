@extends('teacher.teacher-master')

@section('teacher-main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Verify Admit</h1>
            {{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <div class="row">
            <div id="printThis" class="col-md-10 mx-auto">
                <div class="card shadow p-2">
                    @if(Session::has('massage'))
                        <h5 class="text-danger">{{ Session::get('massage') }}</h5>

                    @endif
                    <form action="{{ route('admit.verification') }}" method="get">
                        <div class="form-group">
                            <label for="">Enter Student Id</label>
                            <input type="text" class="form-control" name="sId" placeholder="Student Id">
                        </div>
                        <button class="btn btn-info mt-2">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


