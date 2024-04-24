<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Main Functions</a></li>
                        <li class="breadcrumb-item"><a href="/report">Report</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Table name</th>
                    <th scope="col">User name</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Total recieved</th>
                    <th scope="col">Change</th>
                    <th scope="col">Payment type</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td scope="row">{{ $sale->id }}</td>
                        <td scope="row">{{ $sale->table_name }}</td>
                        <td scope="row">{{ $sale->user_name }}</td>
                        <td scope="row">{{ $sale->total_price }}</td>
                        <td scope="row">{{ $sale->total_recieved }}</td>
                        <td scope="row">{{ $sale->change }}</td>
                        <td scope="row">{{ $sale->payment_type }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>
