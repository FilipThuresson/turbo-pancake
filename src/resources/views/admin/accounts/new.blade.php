@extends('layouts.admin')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between">
            <h3>{{ $title }}</h3>
            <a href="{{ route('admin-accounts-new') }}" class="btn btn-primary">New</a>
        </div>
        <div class="panel-body" id="grid-wrapper">

        </div>
    </div>
</div>
@endsection
