<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-2">
                    Users
                    <a class="btn btn-sm btn-success" href="{{ route('user.create') }}">Create
                        User</a>
                </div>
                <hr>
                @if (Session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session()->get('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->role }}</td>
                                <td scope="row">{{ $user->email }}</td>
                                <td scope="row"><a href="{{ route('user.edit', $user->id) }}"
                                        class="btn btn-warning">Edit</a></td>
                                <td scope="row">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-outline-danger">

                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
