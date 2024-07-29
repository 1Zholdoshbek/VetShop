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
    </div>
@endsection
