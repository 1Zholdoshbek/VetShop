@extends("layouts.admin_main")

@section("content")
<div class="col-3">
        <a href="{{route('admin.drug.create')}}" class="btn btn-block btn-outline-info btn-flat">Create</a>
</div>
<div class="row mt-4 mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Drugs</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <td>Image</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>Category</td>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drugs as $drug)
                            <tr>
                                <td>{{$drug->id}}</td>
                                <td>{{$drug->name}}</td>
                                <td>{{$drug->image}}</td>
                                <td>{{$drug->price}}</td>
                                <td>{{$drug->stock}}</td>
                                <td>{{$drug->category->name}}</td>
                                <td>{{$drug->created_at}}</td>
                                <td>{{$drug->updated_at}}</td>
                                <td>
                                    <a href="{{ route('admin.drug.edit', $drug->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.drug.destroy', $drug->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
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
    </div>


@endsection
