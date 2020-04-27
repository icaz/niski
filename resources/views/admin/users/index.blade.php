@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>
                                
                                <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left btn-sm"><span class="fas fa-edit"></button></a>
                                
                            <form method="POST" action="{{route('admin.users.destroy', $user)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-left btn-sm"><span class="fas fa-trash"></span></button>
                            </form>
                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection


