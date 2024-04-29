@php
    $user = Auth::user();
@endphp
<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        transform: translate(-50%, 5px);
        transform-origin: top left;
    }

</style>
<header class="bg-body-secondary d-flex p-3 px-5 justify-content-between align-items-center rounded-bottom-3">
    <div class="logo text-black">
        <a href="/" class="text-decoration-none text-black d-flex align-items-center justify-content-center gap-3">
            <img src="{{asset('assets/images/logo.png')}}" alt="" width="30">
            <h3 class="title">National Library</h3>
        </a>
    </div>
    <nav class="nav d-flex align-items-center gap-3">
        @if(!Auth::check())
            <a href="{{route('books.index')}}" class="nav-link text-black-50">Books Catalogue</a>
        @elseif(!Auth::check() or Auth::user()->role == 2)
            <a href="{{route('books.index')}}" class="nav-link text-black-50">Books Catalogue</a>
            <a href="{{route('favbooks.index')}}" class="nav-link text-black-50">My Favourites</a>
        @elseif(Auth::user()->role == 1)
            <a href="{{route('books.create')}}" class="nav-link text-black-50">Add New Book</a>
            <a href="{{ route('manage.books') }}" class="nav-link text-black-50">Manage Books</a>
            <a href="{{ route('users.manage') }}" class="nav-link text-black-50">Manage Users</a>
        @endif
    </nav>
    <nav class="nav d-flex align-items-center gap-3">

        @if(Auth::check())
            <button class="nav-link text-black-50" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</button>
            <li class="nav-item dropdown">
                <img
                    src="{{ asset('storage/avatars/' . $user->profile_pic)}}" alt="dp" width="40"
                    class="dropdown-toggle rounded-5" aria-expanded="false" aria-haspopup="true">
                <ul class="dropdown-menu">
                    <li><p class="dropdown-item m-0" href="#">{{ $user->name }}</p></li>
                    <hr class="dropdown-divider">
                    <li><p class="dropdown-item m-0" href="#">{{ $user->email }}</p></li>
                </ul>
            </li>
        @else
            <a href="{{route('login')}}" class="nav-link text-black-50">Login</a>
            <a href="{{ route('register') }}" class="nav-link text-black-50">Register</a>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout Confirmation!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure that you want to logout of this site! Think Again!
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('logout-submit')}}" type="button" class="btn btn-danger">Confirm Logout!</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
