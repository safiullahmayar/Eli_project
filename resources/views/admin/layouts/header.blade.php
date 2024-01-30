@php
    $id = Auth::user()->id;
    $userdata = App\Models\User::find($id);
@endphp
<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
                    <div class="row g-0 p-1">
                        <div class="col-3 text-center">
                            <a href="pages/apps/chat.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="message-square" class="icon-lg mb-1"></i>
                                <p class="tx-12">Chat</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="pages/apps/calendar.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="calendar" class="icon-lg mb-1"></i>
                                <p class="tx-12">Calendar</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="pages/email/inbox.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="mail" class="icon-lg mb-1"></i>
                                <p class="tx-12">Email</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="#"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="instagram" class="icon-lg mb-1"></i>
                                <p class="tx-12">Profile</p>
                            </a>
                        </div>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Leonardo Payne</p>
                                    <p class="tx-12 text-muted">Project status</p>
                                </div>
                                <p class="tx-12 text-muted">2 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Carl Henson</p>
                                    <p class="tx-12 text-muted">Client meeting</p>
                                </div>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Jensen Combs</p>
                                    <p class="tx-12 text-muted">Project updates</p>
                                </div>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Amiah Burton</p>
                                    <p class="tx-12 text-muted">Project deatline</p>
                                </div>
                                <p class="tx-12 text-muted">2 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Yaretzi Mayo</p>
                                    <p class="tx-12 text-muted">New record</p>
                                </div>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        {{-- <a href="{{ route('inbox') }}">View all</a> --}}
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <span class="badge bg-primary badge-number  position-absolute" style="font-size: 8px;
                        /* margin-right: 20px; */
                        margin-left: -6px;
                        top: -2px;">{{ Auth()->user()->unreadNotifications->count() }}</span>

                        {{-- <div class="circle ">  </div> --}}
                    </div>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>{{ Auth()->user()->unreadNotifications->count() }}</p>
                        <a href="{{ route('clearAllNotifications') }}" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">

                            <div class="flex-grow-1 me-2">
                                @foreach (Auth()->user()->unreadNotifications as $notification)
                                    <p>{{ $notification->data['name'] }}</p>
                                    <p>{{ $notification->data['email'] }}</p>

                                    <p class="tx-12 text-muted">
                                        {{ $notification->updated_at->format('m/d/Y') }}
                                    </p>
                                @endforeach

                            </div>
                        </a>

                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="{{ route('inbox') }}">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle"
                        src="{{ !empty($userdata->image) ? url('upload/admin_image/' . $userdata->image) : url('upload/no_image.jpg') }}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{ !empty($userdata->image) ? url('upload/admin_image/' . $userdata->image) : url('upload/no_image.jpg') }}"
                                alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ $userdata->name }}</p>
                            <p class="tx-12 text-muted">{{ $userdata->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="javascript:;" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <form id="logout-form" action="{{ route('user_logout') }}" method="get">
                                @csrf
                                <button type class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
