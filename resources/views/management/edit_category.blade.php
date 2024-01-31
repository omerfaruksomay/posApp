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
                    Create a Category
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
