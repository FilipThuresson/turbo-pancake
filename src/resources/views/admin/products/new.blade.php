@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <a href="{{ url()->previous() }}">Go back</a>
        <form action="{{ route('new-product') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="panel-heading d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <hr>
            <div class="panel-body">
                <div class="row">
                    <div class="col">
                        <label><h4>Title</h4></label>
                        <input class="w-100 form-control" type="text" name="title" placeholder="title" value="{{ old('title') }}">
                    </div>
                    <div class="col">
                        <label><h4>Price</h4></label>
                        <input class="w-100 form-control" type="number" name="price" placeholder="price" value="{{ old('price') }}">
                    </div>
                    <div class="col">
                        <label><h4>Category</h4></label>
                        <select name="category" class="w-100 form-control">
                            <option value="0">No category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->desc }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1"><h4>Description</h4></label>
                        <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="6" value="{{ old('desc') }}"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group files color">
                            <label for="picture-input"><h4>Product Images</h4></label>
                            <input type="file" name="images[]" id="picture-input" class="form-control" multiple />
                        </div>
                    </div>
                    <div class="col">
                        <label for="thumbnail-select" class="from-control"><h4>Thumbnail</h4></label>
                        <select name="thumbnail" id="thumbnail-select" class="w-100 form-control">
                            <option value="0">No images uploaded</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <label><h4>Image preview<h4></label>
                    <div class="image-wrapper">

                    </div>
                </div>
                <hr>
            </div>
        </form>
    </div>
</div>
@endsection
