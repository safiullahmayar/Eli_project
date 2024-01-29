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
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Preview<span>
                                                of Task </span></a>
                                        {{-- <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5> --}}
                                        <form class="editform" action="{{ route('task.update', ['id' => $task->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $task->id }}">
                                            <div class="mb-3">
                                                <label for="login" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Enter Title" value="{{ $task->title }}" readonly>

                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" id="description" class="form-control" readonly>{{ $task ? $task->description : '' }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- @dd($task->status) --}}
                                            <label for="status">Status </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status"
                                                    readonly
                                                    value="inprogress"{{ $task->status == 'inprogress' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status">
                                                    Inprogress </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status"
                                                    readonly
                                                    value="completed"{{ $task->status == 'completed' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status">
                                                    completed </label>
                                            </div>
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
