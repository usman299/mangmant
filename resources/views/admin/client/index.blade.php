@extends('admin.layouts.include')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Client Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>DOB</th>
                                    <th>Image</th>
                                    <th>Aciton</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($client as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->cnic}}</td>
                                        <td>{{$row->dob}}</td>
                                        <td><img style="width: 40px;height:40px; border-radius: 20px;"
                                                 src="{{asset($row->image)}}"></td>

                                        <td>
                                            <a href="{{route('client.edit',['id'=>$row->id])}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="{{route('client.delete',['id'=>$row->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
