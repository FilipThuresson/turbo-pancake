@extends('layouts.admin')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between">
            <h3>{{ $title }}</h3>
            <a href="{{ route('admin-accounts-new') }}" class="btn btn-primary">New</a>
        </div>
        <div class="panel-body" id="grid-wrapper">
            <hr>
            <form action="{{ route('admin-accounts') }}" method="get">
                <div class="row expanded" id="collapseFilter">
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
                            <label><h4>Role</h4></label>
                            <select name="role" id="roles" class="w-100 form-control">
                                <option value="0">No filter</option>
                                @foreach($roles as $role)
                                    <option {{ $request->get('role') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ ucfirst($role->description) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label><h4>Email Verified</h4></label><br>
                            <input type="checkbox" name="email_verified" class="form-check-input" {{$request->get('email_verified') ? 'checked' : ''}}>
                        </div>
                        <div class="col">
                            <label><h4>Start Date</h4></label>
                            <input type="date" name="startdate" class="w-100 form-control" value="{{ $request->get('startdate') ? $request->get('startdate'): '' }}">
                        </div>
                        <div class="col">
                            <label><h4>End Date</h4></label>
                            <input type="date" name="enddate" class="w-100 form-control" value="{{ $request->get('enddate') ? $request->get('enddate'): '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col w-50">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    <div class="col w-50">
                        <button type="button" class="btn ml-auto float-end" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-arrow-bar-down"></i></button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email Verified</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Edit</th>
                  </tr>
                  <hr>
                </thead>
                <tbody>
                    @if ($accounts)
                        @foreach ($accounts as $account)
                            <tr>
                                <th>{{ $account->id }}</th>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->email}}</td>
                                <td>{{ ($account->email_verified_at ? 'Yes' : 'No') }}</td>
                                <td>{{ $account->created_at}}</td>
                                <td>
                                    @php
                                        $count = count($account->roles)
                                    @endphp
                                    @foreach($account->roles as $idx=>$role)
                                        {{($idx+1 != $count) ? ucfirst($role->description) . ', ' : ucfirst($role->description)}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin-accounts-new') }}?id={{ $account->id }}"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if ($accounts)
              {{ $accounts->appends($_GET)->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
