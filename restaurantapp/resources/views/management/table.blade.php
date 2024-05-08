@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-chair"></i> Table
            <a href="/management/table/create" class="btn btn-success btn-sm float-right">
                <i class="fas fa-plus"></i> Create Table
            </a>
            <hr>
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Table</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tables as $table)
                    <tr>
                        <td>{{ $table->id }}</td>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->status }}</td>
                        <td>
                            <a href="/management/table/{{ $table->id }}/edit" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="/management/table/{{ $table->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No tables found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection