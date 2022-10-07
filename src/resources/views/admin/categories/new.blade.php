@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <a href="{{ url()->previous() }}">Go back</a>
        <form action="{{ route('new-category') }}" method="POST">
            @csrf
            <div class="panel-heading d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <hr>
            <div class="panel-body">
                <div class="row">
                    <div class="col">
                        <label><h4>Name / Code</h4></label>
                        <input class="w-100 form-control" type="text" name="name" placeholder="name / code" value="{{ old('name') }}">
                    </div>
                    <div class="col">
                        <label><h4>Description</h4></label>
                        <input class="w-100 form-control" type="text" name="desc" placeholder="Description" value="{{ old('desc') }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
