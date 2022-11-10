@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee Attendance</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee Attendance</li>
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

                            <form method="post" action="{{ route('employees.attendance.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">

                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                                    <div class="form-group col-md-4">
                                        <label for="date">Date</label>
                                        <input type="text" name="date" id="currentDate" class="form-control currentDate" value="" readonly="true" ">

                                        <font style="color:red">
                                          {{($errors->has('name')) ? ($errors->first('name')) : ''}}
                                      </font>
                                    </div>

                                    <div class="form-group col-md-6" style="padding-top: 30px;">
                                        <input type="submit" value="Push" class="btn btn-primary">
                                    </div>`
                                </div>


                              </form>


                            </div>

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

<script>
    var date = new Date();
	var currentDate = date.getDate()+"-"+(date.getMonth()+1)+"-"+date.getFullYear();

    document.getElementById('currentDate').value = currentDate;
</script>

@endsection
