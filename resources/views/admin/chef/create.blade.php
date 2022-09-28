@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chef form</h4>
                <form action="{{ url('/chefMenu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control text-white">
                            <option value="">--Pilih--</option>
                            @foreach ($category as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control text-white" id="nama"
                            placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control text-white" id="no_telp"
                            placeholder="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="foto" class="form-control text-white" id="image"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control text-white" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
