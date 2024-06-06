@section('title', 'Admin Dashboard')
@extends('layouts.admin')


@section('content')
    <div class="container">
        <h2 class="mt-4">Welcome back {{ Auth::user()->name }}!</h2>
        <div id="card-container" class="p-3 h-100  container-fluid ">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div id="next-classes" class="card mb-4 bg-dark">
                        <div class="card-header fw-bold fs-3 background-gradient-color text-white">
                            Actual Projects
                        </div>
                        <table class="table table-dark table-hover m-3 w-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="d-none d-md-table-cell">Starting Date</th>
                                    <th scope="col" class="">Progress</th>
                                    <th scope="col" class="d-none d-md-table-cell">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="hype-class d-flex">
                                                <div
                                                    class="hype-icon-container rounded-circle hype-bg-code d-flex align-items-center justify-content-center text-white ">
                                                    <i class="fa-solid fa-code"></i>
                                                </div>
                                                <span class="ps-2">{{ $project->title }}</span>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-table-cell ">{{ $project->created_at->format('d/m/Y') }}</td>
                                        <td class="">{{ random_int(1, 99) }}%</td>
                                        <td class="d-none d-md-table-cell "><span
                                                class="badge text-bg-warning text-white ">Process</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="faq" class="card mb-4">
                        <div
                            class="card-header text-uppercase fw-bold fs-3  background-gradient-color text-white border-black">
                            f.a.q.
                        </div>
                        <div class="accordion background-gradient-modal border-black" id="accordionExample">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="accordion-item  text-white" style="border: 1px solid black">
                                    <h2 class="accordion-header  ">
                                        <button class="accordion-button collapsed background-gradient-modal text-white"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $i }}" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            Lorem ipsum?
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $i }}"
                                        class="accordion-collapse collapse  text-white background-gradient-modal"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by
                                            default,
                                            until the
                                            collapse plugin adds the appropriate classes that we use to style each element.
                                            These classes
                                            control the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can
                                            modify any of this with custom CSS or overriding our default variables. It's
                                            also
                                            worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>, though
                                            the
                                            transition
                                            does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div id="todo" class="col-12 col-lg-4">
                    <div class="card mb-4 bg-dark">
                        <div class="card-header fw-bold fs-3 background-gradient-color text-white">
                            Todo
                        </div>
                        <ul class="list-group m-3">
                            <li class="list-group-item background-gradient-modal text-white border-black">
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                                <label class="form-check-label" for="firstCheckbox">Do CSS</label>
                            </li>
                            <li class="list-group-item background-gradient-modal text-white border-black">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                <label class="form-check-label" for="secondCheckbox">Do Js</label>
                            </li>
                            <li class="list-group-item background-gradient-modal text-white border-black">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                <label class="form-check-label" for="thirdCheckbox">Do Group project</label>
                            </li>
                        </ul>
                    </div>

                    <div id="active-users" class="card mb-4 bg-dark">
                        <div class="card m-3 background-gradient-color text-white">
                            {{-- <img src="resources/img/stats.jpeg" class="card-img-top" alt="graphic of active users"> --}}
                            <div class="card-body">
                                <h5 class="card-title">Active users</h5>
                                <p class="card-text">List of all users in the last mounth</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-dark text-white border-black">march: 1200</li>
                                <li class="list-group-item bg-dark text-white border-black">april: 800</li>
                                <li class="list-group-item bg-dark text-white border-black">may: 1500</li>
                            </ul>
                            <div class="card-body">
                                <a href="" class="card-link text-decoration-none text-warning">Show a Datailed
                                    Report</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
