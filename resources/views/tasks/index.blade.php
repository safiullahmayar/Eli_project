@extends('admin.layouts.app')
@section('main')
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <!-- partial -->

            <div class="page-content">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-12 col-xl-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="btn btn-primary btn-lg mb-2">Creare New Task</a>

                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h6 class="card-title mb-0">Tasks</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="pt-0">#</th>
                                                <th class="pt-0">Title</th>
                                                <th class="pt-0">Description </th>
                                                <th class="pt-0">Status</th>
                                                <th class="pt-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($tasks)
                                                @foreach ($tasks as $task)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $task->title }}</td>
                                                        <td>{{ $task->description }}</td>
                                                        @if ($task->status == 'inprogress')
                                                            <td>
                                                                <span class="badge bg-danger">{{ $task->status }}</span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <span class="badge bg-success">{{ $task->status }}</span>
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <th> no found</th>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->

            </div>

            <!-- partial:partials/_footer.html -->
            @include('admin.layouts.footer')
            <!-- partial -->

        </div>
    </div>
@endsection
