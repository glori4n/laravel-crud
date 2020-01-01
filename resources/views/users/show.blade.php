@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span><i class="fa fa-users"></i> Users List</span>
                    <button onclick="window.location.href = '/dashboard'" class="mt-2 btn btn-warning" style="float:right" type="button">Go Back</button>
                </div>

                    <div class="card-body">

                        {{-- If any errors are detected, it'll show up here. --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                        @endif

                        {{-- If any message is detected, it'll show up here, then be deleted as soon as the page reloads. --}}
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                            {{ Session::forget('message') }}
                        </div>
                        @endif

                        {{-- Counter for total products. --}}
                        <div style="font-size:17px">

                            <label>Total users:</label>
                                {{$users->count()}}
                        </div>

                        {{-- Table strucure, from DashboardController. --}}
                        <table id="products">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Updated At</th>
                                @if($user_role !== 3)
                                <th>Actions</th>
                                @endif
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    @if($user->role_id !== 1 && $user_role !== 3 || $user_role == 1)
                                    <td style="white-space: nowrap">
                                        <a href="/user-edit/{{$user->id}}" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="/user-delete/{{$user->id}}" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
