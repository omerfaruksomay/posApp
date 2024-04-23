<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-2">
                    Edit menu
                </div>
                <hr>
                <form class="mt-4" action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
