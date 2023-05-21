<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exam Schedule</title>



    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            color:black;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        .font{
            font-size: 15px;
        }
        .authority {
            text-align: center;
            float: right
        }
        .authority h6 {
            margin-top: -10px;
            color: green;
            text-align: center;
        }
        .thanks p {
            color: green;;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="{{public_path('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{public_path('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 15px 0 15px;color: black;font-weight: bold">
    <tr>
        <td valign="top">
         <img src="{{ public_path('assets/img/logo.png') }}" alt="" width="150"/>
        </td>
        <td align="right">
            <pre class="font" >
               Green University Of Bangladesh
               Purbachal American City, Kanchon 1460 <br>
               {{ $firstRow->exam_name }}, {{ $formattedDate }} <br>
               Dhaka 1207,Dhanmondi:#4
            </pre>
        </td>
    </tr>
</table>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Batch</th>
        <th>Date / Time</th>
        <th>Subject</th>
    </tr>
    </thead>
    <tbody>
    <!-- Iterate over each batch -->
    @foreach ($scheduleByBatch as $batch => $schedule)
        <tr>
            <td rowspan="{{ count($schedule) }}">{{ $batch }}</td>
            <!-- Iterate over each schedule entry -->
            @foreach ($schedule as $index => $exam)
                <td>
                    {{ $exam['date'] }} - {{ $exam['time'] }}
                </td>
                <td>
                    {{ $exam['subject'] }}
                </td>
        </tr>
        <!-- Add new row for subsequent entries -->
        @if ($index + 1 < count($schedule))
            <tr>
        @endif
    @endforeach
    @endforeach
    </tbody>
</table>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h6>Authority Signature:</h6>
</div>
</body>
</html>
