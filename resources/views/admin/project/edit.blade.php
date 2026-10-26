@extends('admin.template')
@section('title', 'Edit Project')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="mb-3">Edit Data Project</h5>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Teknologi</label>
                <input type="text" name="teknologi" value="{{ old('teknologi', $project->teknologi) }}"
                    class="form-control @error('teknologi') is-invalid @enderror">
                @error('teknologi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                @if ($project->image)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $project->image) }}" class="img-thumbnail"
                        style="width: 120px; height: 80px; object-fit: cover;">
                </div>
                @endif
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="Selesai" {{ old('status', $project->status) == 'Selesai' ? 'selected' : '' }}>Selesai
                    </option>
                    <option value="In Progress" {{ old('status', $project->status) == 'In Progress' ? 'selected' : '' }}>
                        In Progress</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection