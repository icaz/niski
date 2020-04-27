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
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$role->name}}" required autofocus>
                        </div>
                    </div>

                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection


