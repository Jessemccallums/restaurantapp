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


            <form action="/management/menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF token field -->
                @method('PUT')
                <div class="form-group">
                    <label for="menuName">Edit a Menu</label>
                    <input value="{{$menu->name}}" type="text" name="name" class="form-control" placeholder="Menu...">
                </div>
                <div class="form-group">

                    <label for="menuPrice">Price</label>
                    <input value="{{$menu->price}}" type="text" name="price" class="form-control" placeholder="Price...">

                </div>
                <div class="form-group">
                    <label for="Menu Image">Image</label>
                    <div class="input-group mb-3">

                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input value="{{$menu->description}}" type="text" name="description" class="form-control" placeholder="Description...">

                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
        </div>
    </div>
    @endsection