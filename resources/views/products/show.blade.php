@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span><i class="fa fa-pencil"></i></span> Products List</div>

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

                            <label>Total products in stock:</label>
                                {{$products->count()}}

                                <button  onclick="window.location.href = '/products'" class="mb-3 btn btn-primary" style="float:right" type="submit">Add new product</button>
                        </div>

                        {{-- Table strucure, from DashboardController. --}}
                        <table id="products">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->updated_at}}</td>
                                    <td style="white-space: nowrap">
                                        <a href="/product-edit/{{$product->id}}" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="/product-delete/{{$product->id}}" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
