@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <a href="{{ url()->previous() }}">Go back</a>
        <form action="{{ route('admin-accounts-new-post') }}" method="POST">
            @csrf
            <div class="panel-heading d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <hr>
            <div class="panel-body">
                <div class="row">
                    <div class="col">
                        <label><h4>Name</h4></label>
                        <input class="w-100 form-control" type="text" name="name" placeholder="Name" value="{{ ($user) ? $user->name : '' }}">
                    </div>
                    <div class="col">
                        <label><h4>Email</h4></label>
                        <input class="w-100 form-control" type="email" name="email" placeholder="Email" value="{{ ($user) ? $user->email : '' }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label><h4>Password</h4></label>
                        <input class="w-100 form-control" type="password" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="col">
                        <label><h4>Confirm Password</h4></label>
                        <input class="w-100 form-control" type="password" name="password_confirm" value="{{ old('password_confirm') }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label><h4 class="text-center">Role</h4></label>
                        <select name="role" class="w-100 form-control">
                            <option value="0">No role</option>
                            @foreach($roles as $role)
                                <option {{ $user->hasRole($role->name) ? 'selected' : '' }} value="{{ $role->id }}">{{ ucfirst($role->description) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        @if(is_object($user))
                            <input class="d-none" type="number" name="id" value="{{ $user->id }}">
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
