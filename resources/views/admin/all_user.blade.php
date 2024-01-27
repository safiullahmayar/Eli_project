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
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h6 class="card-title mb-0">Projects</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="eye" class="icon-sm me-2"></i> <span
                                                    class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                    class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                    class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="printer" class="icon-sm me-2"></i> <span
                                                    class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                    data-feather="download" class="icon-sm me-2"></i> <span
                                                    class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="pt-0">#</th>
                                                <th class="pt-0"> Name</th>
                                                <th class="pt-0"> Email</th>
                                                <th class="pt-0">Role </th>
                                                <th class="pt-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr id="row{{ $user->id }}">
                                                    <td class="border-bottom">{{ $loop->iteration }}</td>
                                                    <td class="border-bottom">{{ $user->name }}</td>
                                                    <td class="border-bottom">{{ $user->email }}</td>

                                                    @foreach ($user->roles as $role)
                                                        @if ($role !== null)
                                                            <td class="border-bottom">{{ $role->name }}</td>
                                                        @else
                                                            <td class="border-bottom">No Role</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="border-bottom"> <button type="button"
                                                            class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                            onclick="edituser('{{ $user->id }}')"
                                                            data-bs-target="#exampleModal"
                                                            data-bs-whatever="@mdo">Edit</button>
                                                        <a href="#" onclick="deleteuser('{{ $user->id }}')"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- partial:partials/_footer.html -->
            @include('admin.layouts.footer')
            <!-- partial -->

        </div>
    </div>

    {{-- edit models  --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myform">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                
                                <option value=""></option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit end / --}}
    <!-- Include jQuery and SweetAlert libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Your JavaScript code -->
    <script>
        function deleteuser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Delete This Data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((success) => {
                if (success.isConfirmed) {

                    $.ajax({
                        method: 'get',
                        url: "{{ route('delete_user', ['id' => ':id']) }}".replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );

                            // location.reload();
                            $('#row' + id).remove();
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
        <script type="text/javascript">
            function edituser(id) { 
                $.ajax({
                    url: '{{ route('edit_user', ['id' => ':id']) }}'.replace(':id', id),
                    type: 'get',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(user) {
                        // Handle the data received from the server (e.g., update UI with task details)
                        console.log(user);
                        $('#name').val(user.name);
                        $('#email').val(user.email);
                        
                        if (user.roles) {
                            user.roles.forEach(function(role) {
                                $('#role').append($('<option>', {
                                    value: role.id,
                                    text: role.name
                                }));
                            }); 
                            $('#role').val(user.roles[0].id);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        </script>
@endsection
