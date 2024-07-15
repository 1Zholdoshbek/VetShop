@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.user.store')}}" method="POST">
        @csrf
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>
            <div class="card-body">
                <label>Name</label>
                <input class="form-control form-control-lg" type="text" name="name" placeholder="Name">

                <label>Email</label>
                <input class="form-control form-control-lg" type="text" name="email" placeholder="Email">
                <label>Password</label>
                <input  class="form-control form-control-lg" type="password" name="password" placeholder="Password"></in>
            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class = "btn btn-success col-2 ">Submit</button>
        </div>
    </form>
@endsection
