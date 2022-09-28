@extends('admin.layouts.index')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category form</h4>
                <form action="{{ url('/category', $category->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Nama</label>
                        <input type="text" name="title" class="form-control text-white" id="title"
                            placeholder="title" value="{{ $category->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Slug</label>
                        <input readonly type="text" name="slug" class="form-control bg-black text-white"
                            id="slug" placeholder="slug" value="{{ $category->slug }}">
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
            fetch('/category/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => [
                    slug.value = data.slug
                ])
        })
    </script>
@endsection
