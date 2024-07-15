@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.drug.store')}}" method="POST">
        @csrf
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Create Drug</h3>
            </div>
            <div class="card-body">

                <div>
                    <label>Name</label>
                    <input class="form-control form-control-lg" type="text" name="name" placeholder="name">
                </div>

                <div>
                    <label>Image</label>
                    <input class="form-control" type="text" name="image" placeholder="image">
                </div>

                <div>
                    <label>Category</label>
                    <select class="form-select" aria-label="Categories" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                            <option value="1">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="description" placeholder="description">
                </div>


                <div>
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" placeholder="price">
                </div>

                <div>
                    <label for="">Stock</label>
                    <input class="form-control" type="number" name="stock" placeholder="stock">
                </div>


            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class = "btn btn-success col-2 ">Submit</button>
        </div>
    </form>
@endsection
