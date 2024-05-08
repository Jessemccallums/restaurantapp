@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">

        @include ('management.inc.sidebar')

        <div class="col-md-8">
            <i class="fa-solid fa-burger"></i>
            Menu
            <a href="/management/menu/create" class="btn btn-success btn-sm float-right">
                <i class="fas fa-plus"></i>
                Create Menu
            </a>
            <hr>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($menus as $menu)
                <tr>
                    <td>{{$menu->id}}</td>
                    <td>{{$menu->name}}</td>
                    <td>${{$menu->price}}</td>
                    <td><img src="{{ asset('menu_images')}}/{{$menu->image}}" alt="{{$menu->name}}" width="120px" height="120px"></td>
                    <td>{{$menu->description}}</td>
                    <td>{{$menu->category->name}}</td>
                    <td>
                        <a href="/management/menu/{{$menu->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="/management/menu/{{$menu->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection