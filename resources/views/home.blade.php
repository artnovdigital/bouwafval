@extends('layouts.default')

@section('extraHead')
    <style></style>

@stop

@section('pageTitle')
	<title></title>

@stop

@section('bodyExtras')

@stop

@section('content')


@if($user) 

    {{$user->name}}
    <img src='/storage/{{$user->logo}}' style='width: 150px;'>

@endif




<h1>These are our respected companies</h1>
<ul class="compList">
    @foreach($companies as $company)

    <li class="companies"><a href="/company/{{$company->id}}">{{$company->name}}</a></li>
    
    @endforeach
</ul>
<!--ul>li{Company}.companies$@*5-->

<h1>Login Form</h1>
<form method="POST" action="/login" name="loginForm" onsubmit="return validateForm()">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <br>

  <label for="password">Password:</label>
  <div class="password-toggle">
    <input type="password" id="password" name="password" required>
    <span id="toggleBtn" class="toggle-btn" onclick="togglePasswordVisibility()">&#128064;</span>
  </div>
  <br>

  <div id="errorContainer" class="error"></div>

  <input type="submit" value="Login">
</form>

@if($errors->any())
<h4 style="color:red;">{{$errors->first()}}</h4>
@endif

@stop