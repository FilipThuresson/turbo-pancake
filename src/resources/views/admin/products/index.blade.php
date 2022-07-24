@extends('layouts.admintest')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Products</h3></div>
        <div class="panel-body" id="grid-wrapper">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Thumnail</th>
                    <th scope="col">Trending</th>
                    <th scope="col">Edits</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ mb_strimwidth($product->desc, 0, 50, "...")}}</td>
                                <td><a href="{{ asset(sprintf('/products/%s', $product->image_thumnail->image_path)) }}">{{ $product->image_thumnail->image_path }}</a></td>
                                <td>
                                    @if($product->trending)
                                        <input type="checkbox" checked class="is_trending" id="{{ $product->id }}">
                                    @else
                                        <input type="checkbox" class="is_trending" id="{{ $product->id }}">
                                    @endif
                                </td>
                                <td>
                                    <a href="#"><i class="bi bi-pen"></i></a>
                                    &nbsp;
                                    <a href="#"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <th scope="row">No products</th>
                    @endif
                </tbody>
              </table>
              @if ($products)
                {{ $products->links() }}
              @endif
            <!--
            @if ($products)
                @foreach ($products as $product)
                    <div class="product">
                        <h4>{{ $product->title }}</h4>
                        <img
                            src="{{ asset(sprintf('/products/%s', $product->image_thumnail->image_path)) }}"
                            alt=""
                            class="img-thumbnail"
                            style="width:250px;"
                        >
                        <p>{{ $product->image_thumnail->image_path }}</p>
                    </div>
                @endforeach
            @else
                <p>No products</p>
            @endif
            -->
        </div>
    </div>
</div>
@endsection
