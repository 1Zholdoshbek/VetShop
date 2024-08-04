@extends('layouts.admin_main')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <div class="card">
            <div class="card-header">
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Created At:</strong> {{ $user->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back to Users</a>
            </div>
        </div>

        <h2>User Gallery</h2>
        <form action="{{ route('admin.user.uploadFile', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Upload File:</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>

        <div class="gallery mt-4">
            @foreach($gallery as $file)
                <div class="card mb-4" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $file->file_path) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <form action="{{ route('admin.user.deleteFile', [$user->id, $file->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
