@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow: auto;max-height: 500px">
                <h4 class="card-title">Food Menu form</h4>
                <form action="{{ url('/foodMenu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control text-white">
                            <option value="">--Pilih--</option>
                            @foreach ($category as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control text-white" id="title"
                            placeholder="Title">
                    </div>
                    <input type="hidden" name="slug" class="form-control text-white" id="slug" placeholder="slug">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control text-white" id="price"
                            placeholder="00">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" name="image" class="form-control text-white" onchange="previewImage()"
                            id="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control text-white" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('input', () => {
            fetch('/foodMenu/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => [
                    slug.value = data.slug
                ])
        })

        document.addEventListener('trix-file-accept', (e) => {
            e.preventDefault()
        })

        previewImage = () => {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const imgCreate = URL.createObjectURL(image.files[0]);
            imgPreview.src = imgCreate;
        }
    </script>
@endsection
