@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User form</h4>
                <form>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" readonly name="name" class="form-control text-white bg-black" id="name"
                            placeholder="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" readonly name="email" class="form-control bg-black text-white"
                            id="email" placeholder="00" value="{{ $user->email }}">
                    </div>
                    <a href="javascript:history.back()" class="btn btn-warning">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
