@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">

        @include ('management.inc.sidebar')

        <div class="col-md-8">
            <i class="fa-solid fa-bars"></i>
            Category
            <a href="/management/category/create " class="btn btn-success btn-sm float-right">
                <i class="fas fa-plus"></i>
                Create Category
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="/management/category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="/management/category/{{$category->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection