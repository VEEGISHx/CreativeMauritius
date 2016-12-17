@extends('layouts.app')

@section('content')
<div class="breadcrumbs-navigation">
<span>{{ Route::Input('username') }}</span><span> > Edit Profile</span>
<a href="{{ route('user.profile', ['username' => Auth::user()->username]) }}"><button id="return">Back to profile</button></a>
</div>

<div class="container">

<h1>Edit your profile.</h1>

<form method="post" action="{{ route('user.edit', ['username' => Auth::user()->username]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ Request::old('name') ?: Auth::user()->name }}" placeholder="Enter your new name">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="Location">Location</label>
    <input type="text" name="location" class="form-control" id="location" value="{{ Request::old('location') ?: Auth::user()->location }}" placeholder="Enter your new location">
    @if ($errors->has('location'))
        <span class="help-block">
            <strong>{{ $errors->first('location') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" name="email" class="form-control" id="email1" value="{{ Request::old('email') ?: Auth::user()->email }}" placeholder="Enter your new email">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="Avatar">Upload new avatar</label>
    <input type="file" name="avatar" id="avatar">
    <p class="help-block">Recommended dimensions: 200x200</p>
    <img class="user-avatar preview" src="{{ URL::to('/') }}/uploads/avatars/{{ Auth::user()->avatar}}" alt="{{ Auth::user()->username }}" style="width: 100px; height:100px;">
  </div>

  <div class="form-group">
    <label for="Biography">Write a biography</label>
    <span class="help-block">Describe yourself in a few words...</span>
    <textarea name="biography" class="form-control" rows="3" placeholder="{{ Request::old('biography') ?: Auth::user()->biography }}"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection
