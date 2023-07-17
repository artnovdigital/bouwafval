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
  
      // Toggle password visibility
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var toggleBtn = document.getElementById('toggleBtn');
  
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          toggleBtn.innerHTML = '&#128065;'; // Show open eye icon
        } else {
          passwordInput.type = 'password';
          toggleBtn.innerHTML = '&#128064;'; // Show closed eye icon
        }
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