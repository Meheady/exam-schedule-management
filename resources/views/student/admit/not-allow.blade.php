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

        <div class="row">
            <div id="printThis" class="col-md-10 mx-auto">
                <div class="card shadow p-2">
                    <h3 style="color:red;text-align: center;padding: 20px">
                        You are not allow getting admit. Payment is not clear
                    </h3>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


