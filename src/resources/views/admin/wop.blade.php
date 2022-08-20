@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <a href="{{ url()->previous() }}">Go back</a>
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Work in progress</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
