@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                            <span><i class="fa fa-users"></i></span>
                            <label>Total users:</label>
                                {{$users->count()}}
                                
                                <button onclick="window.location.href = '/users-list'" class="mb-3 btn btn-primary" style="float:right" type="submit">Users list</button>
                        </div>
                        <br>

                        {{-- Counter for total products. --}}
                        <div style="font-size:17px">
                            <span><i class="fa fa-pencil"></i></span>

                            <label>Total products in stock:</label>
                                {{$products->count()}}
                                <button  onclick="window.location.href = '/products-list'" class="mb-3 btn btn-primary" style="float:right" type="submit">Products list</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
