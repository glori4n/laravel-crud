@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new products</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/editproduct/{{$product->id}}">
                            @csrf
                            <label>Product ID:</label>
                            {{$id}}
                            <br>
                            <label>Product Name:</label><br>
                        <input type="text" name="name" value="{{$product->name}}">
                        <br>
                        <br>
                            <label>Product Description:</label><br>
                        <textarea name="description" cols="30" rows="4">{{$product->description}}</textarea><br>
                            <button onclick="window.location.href = '/dashboard'" class="mt-2 btn btn-warning" style="float:left" type="button">Go Back</button>
                            <button class="mt-2 btn btn-primary" style="float:right" type="submit">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
