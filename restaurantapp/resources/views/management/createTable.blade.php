@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        @include ('management.inc.sidebar')

        <div class="col-md-8">
            <i class="fa-solid fa-bars"></i>
            @if($errors -> any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/management/table" method="POST">
                @csrf <!-- CSRF token field -->
                <div class="form-group">
                    <label for="tableName">Table Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Table name...">
                </div>
                <div class="form-group row">
                    <label for="tableStatus">Status</label>
                    <input type="status" name="status" class="form-control" placeholder="Seats...">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>


        </div>
    </div>
</div>
@endsection