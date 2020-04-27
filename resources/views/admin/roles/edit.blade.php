@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Role -> <strong>{{$role->name}}</strong></div>

                <div class="card-body">
                  <form action="{{route('admin.roles.update', $role)}}" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Role</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$role->name}}" required autofocus>
                        </div>
                    </div>

                    @method('PUT')
                    @csrf

                    <div class="form-group col-md-6">
                        @foreach ($users as $user)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="users[]" value="{{$user->id}}"
                                @foreach ($role->users as $roleUser)
                                    @if ($roleUser->id == $user->id)
                                    checked
                                    @endif
                                @endforeach
                                >
                                <label>{{$user->name}}</label>
                            </div>
                        @endforeach
                    </div>
    

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection


