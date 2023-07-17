@extends('layouts.default')

@section('extraHead')
    <style></style>

@stop

@section('pageTitle')
	<title>Company Registration Form</title>

@stop

@section('bodyExtras')

@stop

@section('content')

<h1>Company Registration Form</h1>
<form name="registrationForm" onsubmit="return validateForm()" enctype="multipart/form-data">

  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <label for="companyName">Company Name:</label>
  <input type="text" id="companyName" name="companyName" required>
  <br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <br>

  <label for="password">Desired password:</label>
  <div class="password-toggle">
    <input type="password" id="password" name="password" required>
    <span id="toggleBtn" class="toggle-btn" onclick="togglePasswordVisibility()">&#128064;</span>
  </div>
  <br>

  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone" required>
  <br>

  <label for="companyDescription">Company Description:</label>
  <textarea id="companyDescription" name="companyDescription" rows="4" required></textarea>
  <br>

  <label for="logo">Company Logo:</label>
  <input type="file" id="logo" name="logo" accept="image/*" required>
  <br>

  <div id="errorContainer" class="error"></div>

  <input type="submit" value="Submit">
</form>

<script>
  // Apply phone number mask to the phone field
  var phoneInput = document.getElementById('phone');
  applyPhoneMask(phoneInput);
</script>

@stop