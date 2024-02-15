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

                                        <h4 class="text-center mb-3"> Title : {{ $task->title }}</h4>
                                        <h6 class="text-center text-success mb-3">{{ $task->status }}</h6>
                                        <p class="mb-4">{{ $task->description }}</p>
                                        <h5 class="mb-3">Comments</h5>
                                        <div id="comments">


                                        </div>
                                        <form action="{{ route('comment.store') }}" method="post" id="commentform">
                                            @csrf
                                            <div class="mb-3 d-flex">
                                                <input type="text" class="form-control" name="comment" id="comment"
                                                    required />
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>

                                        </form>
                                        {{-- <a href="#" class="noble-ui-logo logo-light d-block mb-2">Preview<span>
                                                of Task </span></a> --}}
                                        {{-- <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5> --}}
                                        {{-- <form class="editform" action="{{ route('task.update', ['id' => $task->id]) }}"
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
                                            </div> --}}
                                        {{-- @dd($task->status) --}}
                                        {{-- <label for="status">Status </label>
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
                                            </div> --}}

                                        {{-- </form> --}}


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchComments() {
            $.ajax({
                url: "{{ route('getComments', $task->id) }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#comments').html(response.html);
                    console.log(response);
                },
                error: function(xhr) {
                    toastr.warning('Something wrong!');
                }
            });
        }

        $(document).ready(function() {


            $('#commentform').on('submit', function(e) {
                e.preventDefault();
                var task_id = "{{ $task->id }}";
                var message = $('#comment').val();

                $.ajax({
                    url: "{{ route('comment.store') }}",
                    method: 'POST',
                    data: {
                        task_id: task_id,
                        comment: message,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('Comment Added');
                        $('#comment').val('');
                        fetchComments();

                        console.log(response);
                    },
                    error: function(error) {
                        toastr.warning('Something went wrong!');
                        console.log(error
                            .responseText
                        );
                    }
                });
            });
            fetchComments();

        });
    </script>
@endsection
