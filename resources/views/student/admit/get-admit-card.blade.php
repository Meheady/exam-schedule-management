@extends('student.student-master')

@section('student-main')
    <style>
        @media print{
            body * {
                visibility:hidden;
            }
            #printThis, #printThis *{
                visibility: visible;
            }
            #printThis{
                position: absolute;
                left: 0;
                top:0;
            }
        }
        @page{
            size: portrait;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Student Admit Card</h1>
                        <a onclick="printAdmit()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Download Admit</a>
        </div>

        <div class="row">
            <div id="printThis" class="col-md-10 mx-auto">
                <div class="card shadow p-2">
                    <table width="100%" class="maintable">
                        <tr height="30">
                            <td width="25%">
                                <img style="width:150px;height: 150px" src="{{ asset('assets/img/varsity-logo.png') }}" alt="">
                            </td>
                            <td align="center" width="50%">
                                <h3>Green University of Bangladesh</h3>
                                <p>Admit Card</p>
                                <p>Final Exam</p>
                            </td>
                            <td align="center">
                                <img style="width:150px;height: 150px" src="{{ asset('assets/img/person-default.png') }}" alt="">
                            </td>
                        </tr>
                        <tr height="10">
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr align="center">
                                        <th>Program: </th>
                                        <td>CSE (Diploma-Weekend)</td>
                                    </tr>
                                    <tr align="center">
                                        <th>Session: </th>
                                        <td>Summer 2023</td>
                                    </tr>
                                    <tr align="center">
                                        <th>ID: </th>
                                        <td>201000300</td>
                                    </tr>
                                    <tr align="center">
                                        <th>Name: </th>
                                        <td>Md Emtiar Hossain</td>
                                    </tr>
                                </table>
                            </td>
                            <td colspan="2">
                                <table border="1" width="100%">
                                    <tr align="center" height="10">
                                        <th >Course Code</th>
                                        <th >Course Title</th>
                                        <th>Inv. Signature</th>
                                    </tr>
                                    <tr align="center" height="20">
                                        <th>455</th>
                                        <td>Bangla</td>
                                        <td></td>
                                    </tr>
                                    <tr align="center" height="20">
                                        <th>455</th>
                                        <td>Bangla</td>
                                        <td></td>
                                    </tr>
                                    <tr align="center" height="20">
                                        <th>455</th>
                                        <td>Bangla</td>
                                        <td></td>
                                    </tr>
                                    <tr align="center" height="20">
                                        <th>455</th>
                                        <td>Bangla</td>
                                        <td></td>
                                    </tr>
                                    <tr align="center" height="20">
                                        <th>455</th>
                                        <td>Bangla</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        <tr height="60">
                            <td colspan="1">{!! QrCode::generate('https://chat.openai.com/chat'); !!}</td>
                            <td></td>
                            <td style=" padding-top: 40px" align="center">Controller of Examinations</td>
                        </tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')

    <script type="text/javascript">
        function printAdmit(){
            window.print();
        }
    </script>

@endsection
