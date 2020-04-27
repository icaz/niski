@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User -> <strong>{{$user->name}}</strong></div>

                <div class="card-body">
                  <form action="{{route('admin.users.update', $user)}}" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}"
                            @foreach ($user->roles as $userRole)
                                @if ($userRole->id == $role->id)
                                checked
                                @endif
                            @endforeach
                            >
                            <label>{{$role->name}}</label>
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


