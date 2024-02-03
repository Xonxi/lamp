<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Regjistrohu</title>
    <link rel="icon" type="image/x-icon" href="fotot/logo1.jpg">
    <link rel="stylesheet" href="registerForm.css">
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
                <h1>Regjistrohu</h1>
                <div>Ju lutem vazhdoni me poshte</div>
            </div>
            <form class="form-login-card" method="post" action="register.php">
                <div class="form-item">
                    <input type="text" name="name" placeholder="Sheno emrin" required autofocus id="nameInput">
                </div>
                <div class="form-item">
                    <input type="text" name="surname" placeholder="Sheno mbiemrin" required autofocus id="surnameInput">
                </div>

                <div class="form-item">
                    <input type="email" name="email" placeholder="Sheno email-in" required autofocus id="emailInput">
                </div>
                <div class="form-item">
                    <input type="password" name="password" placeholder="Sheno kodin-Lejohet nje simbol, nje numer "
                        required autofocus id="passwordInput">
                </div>

                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox">
                        <label for="rememberMeCheckbox">Me mbaj mend</label>
                        <button type="submit" onclick="validateForm()">Sign up</button>
                        <div class="error-message" id="errorMessage"></div>
            </form>
        </div>
    </div>
    <div class="login-card-footer">
        <a href="Kryefaqja.php">Kthehuni ne kryefaqe</a>.
    </div>
    </div>
    </a>
    </div>
    </div>
    </div>
    <script>
        function validateForm() {

            var nameInput = document.getElementById('nameInput').value;
            var surnameInput = document.getElementById('surnameInput').value;
            var numberInput = document.getElementById('numberInput').value;
            var emailInput = document.getElementById('emailInput').value;
            var passwordInput = document.getElementById('passwordInput').value;

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isEmailValid = emailRegex.test(emailInput);

            var passwordRegex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\d])(?=.*[A-Z]).{6,}$/;
            var isPasswordValid = passwordRegex.test(passwordInput);
            var isPasswordValid = passwordInput.trim() !== '';

            var errorMessageElement = document.getElementById('errorMessage');
            if (!isEmailValid || !isPasswordValid) {
                errorMessageElement.textContent = 'Ju lutem plotesoni te gjitha hapesirat';
            } else {

                alert('Jeni regjistruar me sukses');
                window.location.href = 'kryefaqja.php';
            }
        }

    </script>
</body>

</html>