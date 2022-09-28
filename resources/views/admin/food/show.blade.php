@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow: auto;max-height: 500px">
                <h4 class="card-title">Food Menu form</h4>
                <form enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <input type="text" readonly value="{{ $foodMenu->category->title }}"
                            class="form-control text-white bg-black">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" readonly name="title" class="form-control bg-black text-white"
                            id="title" placeholder="Title" value="{{ $foodMenu->title }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control text-white bg-black" readonly
                            id="price" placeholder="00" value="{{ $foodMenu->price }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <br>
                        <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/' . $foodMenu->image) }}"
                            alt="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea readonly name="description" id="description" class="form-control bg-black text-white" rows="10">{{ $foodMenu->description }}</textarea>
                    </div>
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
