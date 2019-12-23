@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

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
                        <form method="POST" action="/addproduct">
                            @csrf
                            <label>Product Name:</label><br>
                            <input type="text" name="name"><br><br>

                            <label>Product Description:</label><br>
                            <textarea name="description" cols="30" rows="6"></textarea><br>
                            <button type="submit">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
