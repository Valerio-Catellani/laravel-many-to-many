@section('title', 'Technology ' . $technology->name)
@extends('layouts.admin')


@section('content')
    <section class="container py-5">
        <div class="container rounded-2 hype-shadow-white p-2 p-xl-5 background-gradient-color">
            <h1 class="text-center hype-text-shadow text-white fw-bolder mb-5">Technology: {{ $technology->name }}</h1>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-4 d-flex align-items-center justify-content-center technology-detail-img">
                        <i class="{{ $technology->icon }}" style="color: {{ $technology->color }}"></i>
                    </div>
                    <div class="col-8 d-flex flex-column text-white">
                        <h4>Id:</h4>
                        <h6 class="mb-4">{{ $technology->id }}</h6>
                        <h4>Slug:</h4>
                        <p class="mb-4">{{ $technology->slug }}</p>
                        <h4>Hex Color:</h4>
                        <h6 class="mb-4" style="color: {{ $technology->color }}">{{ $technology->color }}</h6>
                        <h4>Icon Class</h4>
                        <h6 class="mb-4">{{ $technology->icon }}</h6>
                    </div>
                </div>
                <h2 class="text-center hype-text-shadow text-white fw-bolder mb-5">All Projects for:
                    {{ $technology->name }} Type
                </h2>
                <div class="container mb-5">
                    <table id="projects-table" class="table table-dark table-hover shadow mb-2 mt-3 hype-unselectable">
                        <thead>
                            <tr>
                                <th scope="col">#id Project</th>
                                <th scope="col">Project Title</th>
                                <th scope="col" class="d-none d-xl-table-cell">Created at</th>
                                <th scope="col" class="d-none d-lg-table-cell">Techonlogies</th>
                                <th scope="col" class="text-center">
                                    Amministration Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technology->projects as $project)
                                <tr>
                                    <td>{{ $project->id }} </td>
                                    <td>{{ $project->title }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $project->created }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        @if ($project->technologies)
                                            <div class="d-flex align-items-center gap-3">
                                                @foreach ($project->technologies as $technology)
                                                    <a class="tec-link hype-pointer position-relative"
                                                        href="{{ route('admin.technologies.show', $technology->slug) }}"><i
                                                            class="{{ $technology->icon }} fs-3 hype-text-shadow position-relative"
                                                            style="color: {{ $technology->color }};">
                                                        </i>
                                                        <div class="tec-info">
                                                            {{ $technology->name }}
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else
                                            <h6>No Technology</h6>
                                        @endif
                                    </td>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.projects.show', $project->slug) }}"
                                                class="table-icon m-1 text-decoration-none">
                                                <div class="icon-container">
                                                    <i
                                                        class=" fa-solid fa-eye fs-3 text-active-tertiary hype-text-shadow hype-hover-size"></i>
                                                </div>
                                            </a>
                                            <a href="{{ route('admin.projects.edit', $project->slug) }}"
                                                class="table-icon m-1 text-decoration-none">
                                                <div class="icon-container">
                                                    <i
                                                        class=" fa-solid fa-pen-to-square fs-3 text-active-tertiary hype-text-shadow hype-hover-size"></i>
                                                </div>
                                            </a>
                                            <form id="delete-form"
                                                action="{{ route('admin.projects.destroy', $project->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="element-delete default-button text-active-primary hype-text-shadow fs-3 m-1"
                                                    type="submit" data-element-id="{{ $project->id }}"
                                                    data-element-title="{{ $project->title }}">
                                                    <div class="icon-container">
                                                        <i class="fa-solid fa-trash-can "></i>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-5 mt-auto">
                    <a href="{{ route('admin.technologies.index') }}">
                        <i role="button" type="submit"
                            class="fa-solid fa-arrow-left fs-1 text-white hype-text-shadow hype-hover-size"></i>
                    </a>
                    <a href="{{ route('admin.technologies.edit', $technology->slug) }}">
                        <i role="button" type="submit"
                            class="fa-solid fa-pen-to-square fs-1 text-active-tertiary hype-text-shadow hype-hover-size "></i>
                    </a>
                    <form id="delete-form" action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="element-delete default-button text-active-primary hype-text-shadow fs-1"
                            type="submit" data-element-id="{{ $technology->id }}"
                            data-element-title="{{ $technology->title }}">
                            <i class="fa-solid fa-trash-can "></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
