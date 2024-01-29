@extends('admin.layouts.app')
@section('main')
<script src="path/to/jquery-3.6.4.min.js"></script>

    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2 pe-md-0">

                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Edit<span>
                                                Tasks</span></a>
                                        {{-- <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5> --}}
                                        <form class="editform" action="{{ route('task.update',['id'=>$task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $task->id }}">

                                            {{-- @dd($task)  --}}
                                            @include('tasks.form_fields', ['task' => $task])
                                            <div class="w-100 mb-3 mt-0">
                                                <button type="submit"
                                                    class="btn btn-primary  btb-lg mb-2 mb-md-0 text-white"
                                                    class="form-control"> Save Change
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.editform').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();

                // Make sure to have the ID available in your Blade view
                var id = "{{ $task }}";

                $.ajax({
                    url: "{{ route('task.update', ['id' => ':id']) }}".replace(':id', id),
                    method: 'POST', // Corrected: 'post' to 'POST'
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        
                        console.log(response);
                        if (response.success) {
                            updateTask(response.task)
                            setTimeout(function() {
                        window.location = "{{ route('task.index') }}";
                    }, 1000);
                    }
                    },
                    error: function(error) {
                        console.log(error.responseText); // Log any errors for debugging
                    }
                });
            });

        function updateTask(task) {
            $('#title').text(task.title);
            $('#description').text(task.description);
            $('#status').text(task.status);
        }
    });
    </script>
@endsection
