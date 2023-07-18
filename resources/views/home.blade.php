@extends('layouts.default')

@section('extraHead')
    <style>
    .homeContent {
        display: flex;
        position: relative;
        width: 100%;
        align-items: flex-start;
        justify-content: space-evenly;
    }

    li.companies {
        display: flex;
        width: 100%;
        list-style: none;
        justify-content: space-between;
    }

    li.companies a {
        text-decoration: none;
        color: #000;
    }

    li.companies a:hover {
        text-decoration: underline;
        transition: 200ms;
    }

    .karmaLevel button {
        width: 25px;
        height: 25px;
        font-size: 20px;
        line-height: 20px;
    }


    </style>

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


<div class="homeContent">
<div class="companiesList">
<h1>These are our respected companies</h1>

<input type='text' name='search' id='search' value='weird'>
<button id='refreshButton'>Refresh</button>

<ul class="compList" id='compList'>
    @foreach($companies as $company)

    <li class="companies"><a href="/company/{{$company->id}}">{{$company->name}}</a>
    <div class="karmaLevel">
        <button class='plusKarma' data-id={{$company->id}} >+</button>
        <span class="karmaRate" data-id={{$company->id}} >{{$company->karma}}</span>
        <button class='minusKarma' data-id={{$company->id}} >-</button>
    </div>
    </li>
    
    @endforeach
</ul>
<!--ul>li{Company}.companies$@*5-->
</div>
<div class="loginForm">
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
</div>
</div>

@stop