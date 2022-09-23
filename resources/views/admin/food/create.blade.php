@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description"> Basic form layout </p>
                <form action="{{ url('/foodmenu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control text-white" id="title"
                            placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control text-white" id="price"
                            placeholder="00">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control text-white" id="image"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control text-white" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
