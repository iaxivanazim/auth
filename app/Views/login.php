<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Authentication</title>
  <style>
    .error {
      color: red;
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?php echo base_url();?>LoginController/loginAuth" method="POST" class="sign-in-form" id="loginForm">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="login_email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="login_password" />
          </div>
          <input type="submit" value="Login" class="btn solid" name="login_submit" />
          <input class="btn transparent" value="Sign up" id="sign-up-btn" />
        </form>
        <form action="<?php echo base_url();?>SignupController/store" method="POST" class="sign-up-form" id="signupForm">
          <h2 class="title">Sign up</h2>
          <?php if(isset($validation)): ?>
            <div>
              <?= $validation->listErrors()?>
            </div>
          <?php endif; ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First Name" name="fname" />
            
          </div>
          <span class="error" id="fnameError"></span>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Last Name" name="lname" />
            
          </div>
          <span class="error" id="lnameError"></span>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" />
            
          </div>
          <span class="error" id="emailError"></span>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="text" placeholder="Phone Number" name="contact" />
            
          </div>
          <span class="error" id="contactError"></span>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
            
          </div>
          <span class="error" id="passwordError"></span>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Repeat Password" name="repeat" />
            
          </div>
          <span class="error" id="repeatError"></span>
          <input type="submit" class="btn" value="Sign up" name="signup_submit" />
          <input class="btn transparent" value="Sign in" id="sign-in-btn" />
        </form>
      </div>
    </div>
  </div>

  <script src="app.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get form elements
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
  
      // Add event listeners to forms
      loginForm.addEventListener('submit', validateLoginForm);
      signupForm.addEventListener('submit', validateSignupForm);
  
      // Validation functions
      function validateLoginForm(event) {
        // Perform validation for login form fields
        // ...
  
        // If there are errors, display them using the error spans
        // Example:
        const email = document.getElementById('loginForm').elements.login_email.value;
        const password = document.getElementById('loginForm').elements.login_password.value;
        const emailError = document.getElementById('loginEmailError');
        const passwordError = document.getElementById('loginPasswordError');
        emailError.textContent = '';
        passwordError.textContent = '';
  
        if (email === '') {
          emailError.textContent = 'Please enter your email.';
          event.preventDefault();
          return;
        }
  
        if (password === '') {
          passwordError.textContent = 'Please enter your password.';
          event.preventDefault();
          return;
        }
      }
  
      function validateSignupForm(event) {
        // Perform validation for signup form fields
        // ...
  
        // If there are errors, display them using the error spans
        // Example:
        const fname = document.getElementById('signupForm').elements.fname.value;
        const lname = document.getElementById('signupForm').elements.lname.value;
        const email = document.getElementById('signupForm').elements.email.value;
        const contact = document.getElementById('signupForm').elements.contact.value;
        const password = document.getElementById('signupForm').elements.password.value;
        const repeat = document.getElementById('signupForm').elements.repeat.value;
        const fnameError = document.getElementById('fnameError');
        const lnameError = document.getElementById('lnameError');
        const emailError = document.getElementById('emailError');
        const contactError = document.getElementById('contactError');
        const passwordError = document.getElementById('passwordError');
        const repeatError = document.getElementById('repeatError');
        fnameError.textContent = '';
        lnameError.textContent = '';
        emailError.textContent = '';
        contactError.textContent = '';
        passwordError.textContent = '';
        repeatError.textContent = '';
  
        // Regular expressions for validation
        const alphabetsRegex = /^[A-Za-z]+$/;
        const emailRegex = /^\S+@\S+\.\S+$/;
        const contactRegex = /^(\+\d{12}|\d{13})$/;
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$&!]).{6,}$/;
  
        if (fname === '') {
          fnameError.textContent = 'Please enter your first name.';
          event.preventDefault();
          return;
        } else if (!alphabetsRegex.test(fname)) {
          fnameError.textContent = 'First name should contain only alphabets.';
          event.preventDefault();
          return;
        }
  
        if (lname === '') {
          lnameError.textContent = 'Please enter your last name.';
          event.preventDefault();
          return;
        } else if (!alphabetsRegex.test(lname)) {
          lnameError.textContent = 'Last name should contain only alphabets.';
          event.preventDefault();
          return;
        }
  
        if (email === '') {
          emailError.textContent = 'Please enter your email.';
          event.preventDefault();
          return;
        } else if (!emailRegex.test(email)) {
          emailError.textContent = 'Please enter a valid email address.';
          event.preventDefault();
          return;
        }
  
        if (contact === '') {
          contactError.textContent = 'Please enter your phone number.';
          event.preventDefault();
          return;
        } else if (!contactRegex.test(contact)) {
          contactError.textContent = 'Please enter a valid phone number.';
          event.preventDefault();
          return;
        }
  
        if (password === '') {
          passwordError.textContent = 'Please enter a password.';
          event.preventDefault();
          return;
        } else if (!passwordRegex.test(password)) {
          passwordError.textContent = 'Password must have at least 6 characters, one alphabet, one number, and one of @#$&!';
          event.preventDefault();
          return;
        }
  
        if (repeat === '') {
          repeatError.textContent = 'Please repeat your password.';
          event.preventDefault();
          return;
        } else if (repeat !== password) {
          repeatError.textContent = 'Passwords do not match.';
          event.preventDefault();
          return;
        }
      }
    });
  </script>
</body>

</html>