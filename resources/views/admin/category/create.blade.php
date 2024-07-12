@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.category.store')}}" method="POST">
        @csrf
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <div class="card-body">
            <label>Name</label>
            <input class="form-control form-control-lg" type="text" name="name" placeholder="name">

            <label>Image</label>
            <input class="form-control" type="text" name="image" placeholder="Default input">
        </div>
        <!-- /.card-body -->

    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class = "btn btn-success col-2 ">Submit</button>
    </div>
    </form>
@endsection
