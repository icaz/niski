@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                          <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>
                                
                                <a href="{{route('admin.roles.edit', $role->id)}}"><button type="button" class="btn btn-primary float-left btn-sm"><span class="fas fa-edit"></button></a>
                                
                            <form method="POST" action="{{route('admin.roles.destroy', $role)}}">
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
                <div class="card-body">

                <div class="card text-white bg-dark card-success card-outline">
                  <div class="card-header">
                    <h5 class="m-0">Add New Role</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="post">
                        @csrf

                    <div class="input-group mb-3">
                      <input type="text" name="name" class="form-control" placeholder="Role...">
                      <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Add New Role</button>
                      </div>
                    </div>

                    </form>
    
                  </div>
                </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection


