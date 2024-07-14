@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.category.update',$category->id)}}" method="POST" xmlns="http://www.w3.org/1999/html">
        @csrf
        @method('PATCH')
        <div class="card card-success">
            <div class="card-body">
                <label>Name</label>
                <input class="form-control form-control-lg" type="text" name="name" placeholder="" value="{{$category->name}}">

                <label>Image</label>
                <input class="form-control" type="text" name="image" placeholder="" value="{{$category->image}}">
            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Updated</button>
        </div>
    </form>
@endsection
