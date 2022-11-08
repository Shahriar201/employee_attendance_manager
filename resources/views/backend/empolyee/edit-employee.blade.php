@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
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
                        <div class="card-header">
                            <h3>Edit Employee
                                <a class="btn btn-success float-right btn-sm" href="{{ route('employees.view') }}">
                                    <i class="fa fa-list"></i>Employee list</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ route('employees.update', $editData->id) }}" id="myForm">
                            @csrf

                            <div class="form-row">
                              <div class="form-group col-md-4">
                                    <label for="role">User Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                              <option value="{{ $role->name }}" {{ ($role->name == $editData->getRoleNames()->first()) ? 'selected' : null }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                               </div>

                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
                                    <font style="color:red">
                                        {{($errors->has('name'))?($errors->first('name')):''}}
                                    </font>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $editData->email }}" class="form-control">
                                    <font style="color:red">
                                        {{($errors->has('email'))?($errors->first('email')):''}}
                                    </font>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>


                          </form>


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

<!-- Page specific script -->
<script>
    $(function () {

      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
          role: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
            required: true,
            equalTo: '#password'
          },
        },
        messages: {
          name: {
            required: "Please enter username"
          },
          role: {
            required: "Please select user type"
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a <em>vaild</em> email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Your password must be at least 6 characters or numbers"
          },
          password2: {
            required: "Please enter confirm password",
            equalTo: "Confirm password does not match"
          },
          //terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

@endsection
