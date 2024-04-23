<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-2">
                    Create a Category
                </div>
                <hr>
                <form class="mt-4" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control ">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
