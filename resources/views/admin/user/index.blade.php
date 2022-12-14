@extends('admin.layouts.index')

@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title">User Table</h4>
            </p>
            <div class="table-responsive">
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
                                <td><a href="/admin/user/{{ $data->id }}"
                                        class="badge badge-info text-decoration-none">show</a></td>
                                <td>
                                    <form action="/admin/user/{{ $data->slug }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('yakin hapus data ?')"
                                            class="badge border-0 badge-danger text-decoration-none">Delete</button>
                                    </form>
                                </td>
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
