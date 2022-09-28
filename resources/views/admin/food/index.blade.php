@extends('admin.layouts.index')

@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title">Food Menu Table</h4>
            </p>
            <div class="table-responsive">
                <a href="{{ url('/foodMenu/create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td> {{ ($datas->currentpage() - 1) * $datas->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td><img src="{{ asset('storage/' . $data->image) }}" alt=""></td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->description }}</td>
                                <td>
                                    <a href="/foodMenu/{{ $data->slug }}"
                                        class="badge badge-info text-decoration-none">Show</a>
                                    <a href="/foodMenu/{{ $data->slug }}/edit"
                                        class="badge badge-warning text-decoration-none">Edit</a>
                                    <form action="/foodMenu/{{ $data->slug }}" class="d-inline" method="post">
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
