@extends('admin.layouts.app')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <div class="page-content">

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times">x</i>
                        </button>
                        <strong>Success !</strong> {{ session('success') }}
                    </div>
                @endif
                <div class="row profile-body">
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card w-100">
                            <div class="card-body">

                                <h6 class="card-title"> Form</h6>

                                <form class="forms-sample" method="post" action="{{ route('store') }}">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name<span class="text-danger">
                                                *</span></label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{ old('name') }}"
                                             autocomplete="off" placeholder="Name">
                                    </div>
@error('name')
    <span>{{ $message }}</span>
@enderror
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address<span
                                                class="text-danger">
                                                *</span></label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                    @error('email')
    <span>{{ $message }}</span>
@enderror
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Password<span class="text-danger">
                                                *</span></label>
                                        <input type="text" class="form-control" id="password" autocomplete="off"
                                            placeholder="password" name="password" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Role<span class="text-danger">
                                                *</span></label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="0">Select Role </option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.layouts.footer')


        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#image").change(function(e) {
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#getimage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
