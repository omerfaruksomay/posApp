<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4 ">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="{{ route('category.index') }}">Category</a>
                    <a class="list-group-item list-group-item-action" href="">Menu</a>
                    <a class="list-group-item list-group-item-action" href="">Table</a>
                    <a class="list-group-item list-group-item-action" href="">User</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-2">
                    Categories
                    <a class="btn btn-sm btn-success" href="{{ route('category.create') }}">Create
                        Category</a>
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
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{ $category->id }}</td>
                                <td scope="row">{{ $category->name }}</td>
                                <td scope="row"><a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-warning">Edit</a></td>
                                <td scope="row">
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-outline-danger">

                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
