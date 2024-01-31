@extends('admin.layouts.app')
@section('main')

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
                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form class="forms-sample" method="post" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="login" name="login"
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="Password"
                                                    autocomplete="current-password" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                                            </div>
                                            <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>
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
@endsection
