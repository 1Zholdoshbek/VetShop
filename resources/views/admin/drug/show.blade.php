@extends('layouts.admin_main')

@section('content')
    <div class="container">
        <h1>{{ $drug->name }}</h1>
        @if ($drug->image)
            <div>
                <img src="{{ asset('storage/' . $drug->image) }}" alt="{{ $drug->name }}" style="max-width: 200px;">
            </div>
        @endif
        <p><strong>Description:</strong> {{ $drug->description }}</p>
        <p><strong>Price:</strong> {{ $drug->price }}</p>
        <p><strong>Stock:</strong> {{ $drug->stock }}</p>
        <p><strong>Category:</strong> {{ $drug->category->name }}</p>
        <p><strong>Currency:</strong> {{ $drug->currency->code }}</p>
        <p><strong>Created at:</strong> {{ $drug->created_at }}</p>
        <p><strong>Updated at:</strong> {{ $drug->updated_at }}</p>
        <a href="{{ route('admin.drug.index') }}" class="btn btn-primary">Back</a>
        <h2>Gallery</h2>
        <div>
            @if($drug->gallery && $drug->gallery->count() > 0)
                @foreach($drug->gallery as $image)
                    <div>
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="Drug Image" width="150" height="150">
                        <form action="{{ route('admin.drug.deleteImage', ['id' => $drug->id, 'imageId' => $image->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p>No images in the gallery.</p>
            @endif
        </div>

        <!-- Add Image Section -->
        <h2>Add Image</h2>
        <form action="{{ route('admin.drug.addImage', $drug->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Choose Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Image</button>
        </form>
    </div>
@endsection
