@extends('layouts.admin')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between">
            <h3>{{ $title }}</h3>
            <a href="#" class="btn btn-primary">New</a>
        </div>
        <div class="panel-body" id="grid-wrapper">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name / Code</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Amount of uses</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                  <hr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td scope="row">{{ $category->name }}</td>
                                <td colspan="3">{{ $category->desc }}</td>
                                <td colspan="2">{{ $category->uses() }}</td>
                                <td scope="row">
                                    <a href="#"><i class="bi bi-trash"></i></a>
                                    <a href="#"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <th scope="row">No products</th>
                    @endif
                </tbody>
              </table>
              @if ($categories)
                {{ $categories->links() }}
              @endif
        </div>
    </div>
</div>
@endsection
