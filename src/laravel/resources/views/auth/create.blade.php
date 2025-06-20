@extends('layouts.app')

@section('content')

<form action="{{ route('register.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password"
    placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="form-group">
    {!! NoCaptcha::display() !!}
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>

{!! NoCaptcha::renderJs() !!}

@endsection