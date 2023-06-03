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
                    <table border="1">
                        <tr >
                            <th>Photo: </th>
                            <td >
                                <img style="width:150px;height: 150px" src="{{ $user->photo == null? asset('assets/img/person-default.png'): asset($user->photo) }}" width="149px" height="149px" alt="">
                            </td>
                        </tr>
                        <tr >
                            <th>Program: </th>
                            <td>{{ $user->department }}</td>
                        </tr>
                        <tr >
                            <th>ID: </th>
                            <td>{{ $user->student_id }}</td>
                        </tr>
                        <tr >
                            <th>Name: </th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr >
                            <th style="background-color: #c50404"> <b style="color:white">Exam Permission:</b></th>
                            <td style="background-color: #c50404"><b style="color:white"> Not Approved</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


