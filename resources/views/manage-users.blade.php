<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')

    <title>Manage Books | National Library</title>
</head>
<body class="container">
@include('components.header')
<div class="page mt-5 px-3">
    <h1 class="title">Manage Users</h1>
    <p class="body-text">Edit users and do action on the users records! </p>

    <i>Current Admin: {{Auth::user()->email }}</i>

    <div class="pagination my-5">
        {{ $users->links() }}
    </div>

    <table class="table table-striped">
        <thead class="table-primary">
        <tr>
            <th>
                ID
            </th>
            <th>
                PP
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Start Date
            </th>
            <th>
                Role
            </th>
            <th>
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>
                    {{ $user->id }}
                </th>
                <th>
                    <img class="me-3 d-block rounded" src="{{ asset('storage/covers/' . $user->book_cover) }}" alt=""
                         width="60">
                </th>
                <th>
                    {{ $user->name }}
                </th>
                <th>
                    {{ $user->email }}
                </th>
                <th>
                    {{ $user->created_at }}
                </th>
                <th>
                    {{ $user->role }}
                </th>
                <th>
                    <form method="post" action="{{ route('users.delete', ['user'=>$user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>

@include('components.footer')

</body>
</html>
