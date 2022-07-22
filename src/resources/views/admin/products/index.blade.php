@extends('layouts.admintest')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Products</h3></div>
        <div class="panel-body" id="grid-wrapper">
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
        </div>
    </div>
</div>
@endsection
