@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee Details</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee Details</li>
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
                                        <th>Employee Name</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeDetails as $key => $employeeDetail)

                                        <tr class="{{ $employeeDetail->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employeeDetail->employee->name ?? '' }}</td>
                                            <td>{{ $employeeDetail->name ?? '' }}</td>
                                            <td>{{ $employeeDetail->Address ?? '' }}</td>
                                            <td>{{ $employeeDetail->employee->status }}</td>
                                            <td>{{ $employeeDetail->image ?? '' }}</td>
                                            <td>
                                                <a title="Edit" id="edit" class="btn btn-sm btn-primary" href="{{ route('employees.details.edit', $employeeDetail->id)}}">
                                                    <i class="fa fa-edit">

                                                    </i>
                                                </a>
                                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('employees.details.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $employeeDetail->id }}">
                                                    <i class="fa fa-trash"> </i>
                                                </a>
                                            </td>
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
