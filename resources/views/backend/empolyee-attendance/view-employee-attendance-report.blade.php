@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee Attendance Reports</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee Attendance Reports</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Check In Time</th>
                                        <th>Check Out Time</th>
                                        <th>Total Working Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendanceReports as $key => $attendanceReport)

                                    <?php
                                        // $eheckin = date('H:i:s', strtotime($attendanceReport->created_at));
                                        // $eheckin =  Carbon\Carbon::parse($attendanceReport->created_at)->format('g:i:s')->toDateTimeString();
                                        // $eheckout = date('H:i:s', strtotime($attendanceReport->updated_at));
                                        // $eheckout = Carbon\Carbon::parse($attendanceReport->updated_at)->format('g:i:s')->toDateTimeString();

                                        // $totalWokringHours = $eheckin->diffAsCarbonInterval($eheckout)->hours;
                                        // $totalWokringHours = \Carbon\Carbon::createFromFormat($eheckin, $eheckout)
                                        // $diff = $eheckin->diffInDays ($eheckout);
                                        // print( $totalWokringHours);

                                        $to = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $attendanceReport->created_at);

                                        $from = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $attendanceReport->updated_at);



                                        $diff_in_hours = $to->diffInHours($from);
                                    ?>

                                        <tr class="{{ $attendanceReport->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $attendanceReport->name }}</td>
                                            <td>{{ $attendanceReport->date }}</td>
                                            {{-- <td>{{ date('H:i:s', strtotime($attendanceReport->created_at)) }}</td> --}}
                                            <td>{{ Carbon\Carbon::parse($attendanceReport->created_at)->format('g:i A') }}</td>
                                            <td>{{ Carbon\Carbon::parse($attendanceReport->updated_at)->format('g:i A') }}</td>
                                            <td>{{ $diff_in_hours }}</td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </section>

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
