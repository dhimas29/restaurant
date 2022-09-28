@extends('admin.layouts.index')

@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title">Chef Table</h4>
            </p>
            <div class="table-responsive">
                <a href="{{ url('/chefMenu/create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Image</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chef as $data)
                            <tr>
                                <td> {{ ($chef->currentpage() - 1) * $chef->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td><img src="{{ asset('storage/' . $data->foto) }}" alt=""></td>
                                <td>{{ $data->no_telp }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    <a href="/chefMenu/{{ $data->id }}/edit"
                                        class="badge badge-warning text-decoration-none">Edit</a>
                                    <form action="/chefMenu/{{ $data->id }}" class="d-inline" method="post">
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

                    {{ $chef->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
