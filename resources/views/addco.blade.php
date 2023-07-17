<!DOCTYPE html>
<html>
<head>
  <title>Company Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      height: 80px;
    }

    input[type="file"] {
      margin-top: 5px;
    }

    .error {
      color: red;
      margin-top: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <script>
    // Phone number mask pattern (###) ###-####
    function applyPhoneMask(input) {
      input.addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/\D/g, '').substring(0, 10);
        var value = e.target.value;
        var formattedValue = '';
        if (value.length > 0) {
          formattedValue += '(' + value.substring(0, 3);
        }
        if (value.length > 3) {
          formattedValue += ') ' + value.substring(3, 6);
        }
        if (value.length > 6) {
          formattedValue += '-' + value.substring(6, 10);
        }
        e.target.value = formattedValue;
      });
    }

    // Validate the form
    function validateForm() {
      var companyName = document.forms['registrationForm']['companyName'].value;
      var email = document.forms['registrationForm']['email'].value;
      var phone = document.forms['registrationForm']['phone'].value;
      var companyDescription = document.forms['registrationForm']['companyDescription'].value;
      var logo = document.forms['registrationForm']['logo'].value;
      var password = document.forms['registrationForm']['password'].value;

      var errorMessages = [];

      if (companyName === '') {
        errorMessages.push('Company Name is required');
      }

      if (email === '') {
        errorMessages.push('Email is required');
      }

      // Email validation pattern
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        errorMessages.push('Email is not valid');
      }

      if (phone === '') {
        errorMessages.push('Phone is required');
      }

      // Phone validation pattern
      var phonePattern = /^\(\d{3}\) \d{3}-\d{4}$/;
      if (!phonePattern.test(phone)) {
        errorMessages.push('Phone is not valid');
      }

      if (companyDescription === '') {
        errorMessages.push('Company Description is required');
      }

      if (logo === '') {
        errorMessages.push('Logo is required');
      }

      if (password === '') {
        errorMessages.push('Password is required');
      }

      if (errorMessages.length > 0) {
        // Display error messages
        var errorContainer = document.getElementById('errorContainer');
        errorContainer.innerHTML = '';
        errorMessages.forEach(function (errorMessage) {
          var p = document.createElement('p');
          p.innerText = errorMessage;
          errorContainer.appendChild(p);
        });
        return false;
      }

      return true;
    }
  </script>
</head>
<body>
  <h1>Company Registration Form</h1>
  <form method="POST" name="registrationForm" onsubmit="return validateForm()" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <label for="companyName">Company Name:</label>
    <input type="text" id="companyName" name="companyName" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
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
</body>
</html>
