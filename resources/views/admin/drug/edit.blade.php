@extends("layouts.admin_main")
@section("content")

    <form action="{{route('admin.drug.update',$drug->id)}}" method="POST" xmlns="http://www.w3.org/1999/html">
        @csrf
        @method('PATCH')
        <div class="card card-success">
            <div class="card-body">
                <div class="">
                    <label>Name</label>
                    <input class="form-control form-control-lg" type="text" name="name" placeholder="" value="{{$drug->name}}">
                </div>

                <div>
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                            <option value="1">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

               <div>
                   <label>Image</label>
                   <input class="form-control" type="text" name="image" placeholder="" value="{{$drug->image}}">

               </div>

                <div>
                    <label>Description</label>
                    <input class="form-control" type="text" name="description" placeholder="" value="{{$drug->description}}">

                </div>

                <div>
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" placeholder="" value="{{$drug->price}}">

                </div>

                <div>
                    <label>Stock</label>
                    <input class="form-control" type="number" name="stock" placeholder="" value="{{$drug->stock}}">

                </div>

            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Updated</button>
        </div>
    </form>
@endsection
