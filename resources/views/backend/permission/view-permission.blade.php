@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage User</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
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
                            <h3>Permissions List
                                {{-- @role('admin') --}}
                                    <a class="btn btn-success float-right btn-sm" href="{{ route('permissions.add') }}">
                                        <i class="fa fa-plus-circle"></i>Add Permisson</a>
                                {{-- @endrole --}}

                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered">
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>

                                @foreach ($permissions as $key => $permission)
                                    <tr class="{{ $permission->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a title="Edit" id="edit" class="btn btn-primary btn-sm" href="{{ route('permissions.edit', $permission->id) }}"> <i class="fa fa-edit"></i>
                                            </a>

                                            <a title="Delete" id="delete" class="btn btn-danger btn-sm" href="{{ route('permissions.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $permission->id }}"> <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
