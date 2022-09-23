@extends('admin.layouts.index')

@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title">Hoverable Table</h4>
            <p class="card-description"> Add class <code>.table-hover</code>
            </p>
            <div class="table-responsive">
                <a href="/foodmenu/create">Add</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td> {{ ($datas->currentpage() - 1) * $datas->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td><a href="/users/delete/{{ $data->id }}"
                                        class="badge badge-danger text-decoration-none">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">

                    {{ $datas->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
