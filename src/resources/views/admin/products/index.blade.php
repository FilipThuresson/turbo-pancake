@extends('layouts.admin')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between">
            <h3>{{ $title }}</h3>
            <a href="{{ route('admin-products-new') }}" class="btn btn-primary">New</a>
        </div>
        <div class="panel-body" id="grid-wrapper">
            <hr>
            <form action="{{ route('admin-products') }}" method="get">
                <div class="row">
                    <div class="col">
                        <label><h4>Search</h4></label>
                        <input
                            class="w-100 form-control"
                            type="text"
                            name="search"
                            value="{{ ($request->get('search') !== null ? $request->get('search') : '') }}"
                        />
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
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Thumnail</th>
                    <th scope="col">Price</th>
                    <th scope="col">Trending</th>
                    <th scope="col">Edits</th>
                  </tr>
                  <hr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ mb_strimwidth($product->desc, 0, 50, "...")}}</td>
                                <td>
                                    @if(isset($product->image_thumnail->image_path))
                                    <a target="_about" href="/products/{{ $product->image_thumnail->image_path }}">
                                        <img src="/products/{{ $product->image_thumnail->image_path }}" alt="thumnail" class="thumbnail-preview">
                                    </a>
                                    @else
                                    <p>No Thumnail for this picture</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    @if($product->trending)
                                        <input type="checkbox" checked class="is_trending" id="{{ $product->id }}">
                                    @else
                                        <input type="checkbox" class="is_trending" id="{{ $product->id }}">
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <th class="text-center" colspan="9" scope="row">No products</th>
                    @endif
                </tbody>
              </table>
              @if ($products)
                {{ $products->links() }}
              @endif
        </div>
    </div>
</div>
@endsection
