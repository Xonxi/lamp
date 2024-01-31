<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>Kyqu</title>
  <link rel="icon" type="image/x-icon" href="fotot/logo1.jpg">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>

<body>

  <div class="login-card-container">
    <div class="login-card">
      <div class="login-card-logo">
        <img src="fotot/logo1.jpg" alt="logo">
      </div>
      <div class="login-card-header">
        <h1>Kyquni</h1>
        <div>Ju lutem vazhdoni me poshte</div>
      </div>
      <form class="form-login-card" id="login-form" method="post" action="verify-login.php">
        <div class="form-item">
          <span class="material-symbols-outlined">
            mail
          </span>
          <input type="email" placeholder="Sheno email-in" required autofocus id="emailInput">
        </div>

        <div class="form-item">
          <span class="material-symbols-outlined">
            lock
          </span>
          <input type="password" placeholder="Sheno kodin" required id="passwordInput">
        </div>

        <div class="form-item-other">
          <div class="checkbox">
            <input type="checkbox" id="rememberMeCheckbox">
            <label for="rememberMeCheckbox">Me mbaj mend</label>
            <button type="button" onclick="validateForm()">Sign In</button>
          </div>

          <div class="error-message" id="errorMessage"></div>
        </div>
      </form>

      <div class="login-card-footer">
        Nuk keni llogari? <a href="registerFormhtml.php">Krijoni llogari te re</a>.
      </div>
    </div>
    <script>
      function validateForm() {
        var emailInput = document.getElementById('emailInput').value;
        var passwordInput = document.getElementById('passwordInput').value;

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var isEmailValid = emailRegex.test(emailInput);

        var passwordRegex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\d])(?=.*[A-Z]).{6,}$/;
        var isPasswordValid = passwordRegex.test(passwordInput);

        var errorMessageElement = document.getElementById('errorMessage');

        if (!isEmailValid || !isPasswordValid) {
          errorMessageElement.textContent = 'Gabim Kodi ose Emaili';
          return false;

        } else {
          setTimeout(function () {
            alert('Jeni kyqur me sukses');
            window.location.href = 'kryefaqja.php';
          }, 3000);
          return false;
        }
      }
    </script>
</body>

</html>