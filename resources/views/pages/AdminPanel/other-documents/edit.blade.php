@extends('layouts.apps')
@section('title', 'Edit Document')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Document</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('other-documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $document->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $document->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">File (Leave empty to keep current file)</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                    <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX (Max: 10MB)</small>
                </div>
                <div class="form-group">
                    <label>Current File:</label>
                    <p>{{ $document->file_path }}</p>
                </div>
                <button type="submit" class="btn btn-primary">Update Document</button>
                <a href="{{ route('other-documents.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection