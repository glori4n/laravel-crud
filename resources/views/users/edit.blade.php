@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{$id}}</div>

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
                    <form method="POST" action="/edituser/{{$user->id}}">
                            @csrf
                            <label>Name:</label><br>
                            <input type="text" name="name" value="{{$user->name}}"><br><br>
                            
                            <label>E-mail:</label><br>
                            <input type="email" name="email" value="{{$user->email}}"><br><br>

                            <button onclick="window.location.href = '/users-list'" class="mt-2 btn btn-warning" style="float:left" type="button">Go Back</button>
                            <button class="mt-2 btn btn-primary" style="float:right" type="submit">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
