<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-2">
                    Menus
                    <a class="btn btn-sm btn-success" href="{{ route('menu.create') }}">Create
                        Menu</a>
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
                            <th scope="col">Price</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->price }}</td>
                                <td>
                                    <img src="{{ asset('menu_images') }}/{{ $menu->image }}" alt="{{ $menu->name }}"
                                        width="120px" height="120px" class="img-thumbnail">
                                </td>
                                <td>{{ $menu->desc }}</td>
                                <td>{{ $menu->category->name }}</td>
                                <td><a href="/management/menu/{{ $menu->id }}/edit"
                                        class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-outline-danger">

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
