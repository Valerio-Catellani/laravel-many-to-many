@section('title', 'Add a Technology')
@extends('layouts.admin')


@section('content')
    <section class="container py-5">


        <div class="container rounded-2 hype-shadow-white p-5 background-gradient-color">
            <h1 class="text-center hype-text-shadow text-white fw-bolder">Add a Technology</h1>

            <form id="icon-form" action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 @error('name') err-animation @enderror">
                    <label for="name" class="form-label text-white">Technology Name</label>
                    <input type="text" class="form-control @error('name') is-invalid err-animation @enderror"
                        id="name" name="name" value="{{ old('name') }}" required maxlength="255">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 @error('color') err-animation @enderror">
                    <label for="color" class="form-label text-white">Technology Color (Hexdecimal)</label>
                    <input type="text" class="form-control @error('color') is-invalid err-animation @enderror"
                        id="color" name="color" value="{{ old('color') }}" maxlength="7" minlength="7">
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex flex-column">
                    <div class=" @error('icon') err-animation @enderror">
                        <label for="icon" class="form-label text-white">Technology Icon Class</label>
                        <input type="text" class="form-control @error('icon') is-invalid err-animation @enderror"
                            id="icon" name="icon" value="{{ old('icon') }}" maxlength="255" minlength="3">
                        @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="tec-icon-preview" class=" technology-detail-img text-center">
                    </div>
                </div>


                <br>
                <div class="text-center w-25 mx-auto d-flex gap-2">
                    <button type="submit" class="mine-custom-btn mt-3 w-100">Save</button>
                    <a href="{{ route('admin.technologies.index') }}"
                        class="mine-custom-btn min-custom-btn-grey mt-3 w-100">Back</a>
                </div>
            </form>
        </div>

    </section>
@endsection
