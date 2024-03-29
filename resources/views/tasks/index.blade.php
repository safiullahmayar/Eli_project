@extends('admin.layouts.app')
@section('main')
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header', ['notifications' => $notifications])
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
                                <a href="{{ route('task.create') }}" class="btn btn-primary btn-lg mb-2">Creare New Task</a>
                                @if (Session::get('message'))
                                    <div class=" alert alert-success">
                                        {{ session::get('message') }},
                                    </div>
                                @endif

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
                                                        <td>{{ Str::limit($task->description, 50, '...') }}</td>

                                                        @if ($task->status == 'inprogress')
                                                            <td>
                                                                <span class="badge bg-danger">{{ $task->status }}</span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <span class="badge bg-success">{{ $task->status }}</span>
                                                            </td>
                                                        @endif
                                                        {{-- @if (auth()->check() && auth()->user()->hasRole('admin'))   --}}
                                                        {{-- @can('viewAny', $task) --}}
                                                        <td>
                                                            <a href="{{ route('task.edit', ['id' => $task->id]) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="#" onclick="Deletetask('{{ $task->id }}')"
                                                                class="btn btn-sm btn-danger">Delete</a>

                                                            <a href="{{ route('task.show', ['id' => $task->id]) }}"
                                                                class="btn btn-sm btn-danger">Preview</a>

                                                            {{-- @endcan --}}

                                                            {{-- @endif --}}

                                                        </td>
                                                        {{-- @endcan --}}
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
    <script>
        function Deletetask(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((data) => {
                if (data.isConfirmed) {
                    $.ajax({
                        url: "{{ route('task.delete', ['id' => ':id']) }}".replace(':id', id),
                        method: 'get',
                        type: 'delete',
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $("#row" + id).remove();
                        },
                        error: function(error) {

                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the file.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
