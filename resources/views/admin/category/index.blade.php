@extends('admin.layouts.index')

@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title">Category Table</h4>
            </p>
            <div class="table-responsive">
                <a href="{{ url('/category/create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $data)
                            <tr>
                                <td> {{ ($category->currentpage() - 1) * $category->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td>
                                    <a href="/category/{{ $data->slug }}/edit"
                                        class="badge badge-warning text-decoration-none">Edit</a>
                                    <form action="/category/{{ $data->slug }}" class="d-inline" method="post">
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

                    {{ $category->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
