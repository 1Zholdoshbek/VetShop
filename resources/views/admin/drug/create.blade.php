@extends("layouts.admin_main")
@section("content")

    <form action="{{ route('admin.drug.store') }}" method="POST" enctype="multipart/form-data">
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
                    <input class="form-control" type="file" name="image" placeholder="image">
                </div>

                <div>
                    <label>Category</label>
                    <select class="form-select" aria-label="Categories" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Description</label>
                    <input class="form-control" type="text" name="description" placeholder="description">
                </div>

                <div>
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" placeholder="price">
                </div>

                <div>
                    <label>Stock</label>
                    <input class="form-control" type="number" name="stock" placeholder="stock">
                </div>

                <div>
                    <label>Currency</label>
                    <select class="form-select" aria-label="Currencies" name="currency_id">
                        <option selected>Open this select menu</option>
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success col-2">Submit</button>
        </div>
    </form>
@endsection
