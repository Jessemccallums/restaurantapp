@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="management/category" class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-bars"></i>
                    Category
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-burger"></i>
                    Menu
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-chair"></i>
                    Table
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-users-gear"></i>User
                </a>
            </div>
        </div>
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


            <form action="/management/table/{{$table->id}}" method="POST">
                @csrf <!-- CSRF token field -->
                @method('PUT')
                <div class="form-group">
                    <label for="tableName">Edit a Table</label>
                    <input value="{{$table->name}}" type="text" name="name" class="form-control" placeholder="Table name...">
                </div>
                <div class="form-group">
                    <label for="tableStatus">Status</label>
                    <input value="{{$table->status}}" type="text" name="status" class="form-control" placeholder="Status...">

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection