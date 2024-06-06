@section('title', 'Admin Dashboard / Projects')
@extends('layouts.admin')


@section('content')
    <section class="container py-5">


        <div class="container rounded-2 shadow p-5 background-gradient-color">
            <h1 class="text-center hype-text-shadow text-white fw-bolder">Edit Project({{ $project->id }}) :
                {{ $project->title }}</h1>

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 @error('title') err-animation @enderror">
                    <label for="title" class="form-label text-white">Project Title</label>
                    <input type="text" class="form-control @error('title') is-invalid err-animation @enderror"
                        id="title" name="title" value="{{ old('title', $project->title) }}" required maxlength="255"
                        minlength="3">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 @error('description') err-animation @enderror">
                    <label for="description" class="form-label text-white">Description</label>
                    <textarea class="form-control @error('description') is-invalid err-animation @enderror" id="description"
                        name="description" style="min-height: 300px">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 @error('created') err-animation @enderror">
                    <label for="created" class="form-label text-white">Date of Creation</label>
                    <input type="date" class="form-control @error('created') is-invalid err-animation @enderror"
                        id="created" name="created" value="{{ old('created', $project->created) }}" required>
                    @error('created')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label text-white">Select Type</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                        <option value="">Select Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="technology_id" class="form-label text-white">Select Techonologies</label>
                    <div id="technology_id">
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline text-white">
                                <input class="form-check-input" type="checkbox" name="technologies[]" id="inlineCheckbox1"
                                    value="{{ $technology->id }}"
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="mb-3 @error('image_url') err-animation @enderror d-flex gap-5 align-items-center">
                    <div class="w-25 text-center">
                        @if ($project->image_url)
                            <img id="uploadPreview" class="w-100" width="100"
                                src="{{ asset('storage/' . $project->image_url) }}" alt="preview">
                        @else
                            <img id="uploadPreview" class="w-100" width="100" src="/images/placeholder.png"
                                alt="preview">
                        @endif
                    </div>
                    <div class="w-75">
                        <label for="image" class="form-label text-white">Image (URL)</label>
                        <input type="file" accept="image/*"
                            class="form-control @error('image_url') is-invalid err-animation @enderror" id="upload_image"
                            name="image_url" value="{{ old('image_url', $project->image_url) }}">
                        @error('image_url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="text-center w-25 mx-auto d-flex gap-2">
                        <button type="submit" class="mine-custom-btn mt-3 w-100">Save</button>
                        <a href="{{ route('admin.projects.index') }}"
                            class="mine-custom-btn min-custom-btn-grey mt-3 w-100">Back</a>
                    </div>
            </form>
        </div>

    </section>
@endsection
