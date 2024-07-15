@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.user.update',$user->id)}}" method="POST" xmlns="http://www.w3.org/1999/html">
        @csrf
        @method('PATCH')
        <div class="card card-success">
            <div class="card-body">
                <label>Name</label>
                <input class="form-control form-control-lg" type="text" name="name" placeholder="" value="{{$user->name}}">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label>Email</label>
                <input class="form-control" type="text" name="email" placeholder="" value="{{$user->email}}">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Updated</button>
        </div>
    </form>
@endsection
