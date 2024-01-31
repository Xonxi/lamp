<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Koleksioni</title>
    <link rel="icon" type="image/x-icon" href="fotot/logo1.jpg">

</head>

<body>

    <header class="hero">
        <nav>
            <img src="fotot/logo1.jpg" alt="Logo" class="logo">
            <ul>
                <li><a href="Kryefaqja.php">Kryefaqja</a></li>
                <li><a href="koleksioni.php">Koleksioni</a></li>
                <li><a href="login.php">Kyqu</a></li>
                <li> <a href="Kontakti.html">Kontakti</a></li>
            </ul>
        </nav>
    </header>

<!-- Update your HTML with the following button markup -->
<section id="contactCollection" class="contact-collection">
    <div class="container">
        <h2>Koleksioni</h2>
        <div class="slider-container">
            <div class="slides">
                <div class="slide"><img src="fotot/LSD01-11-2000x2000.jpg" alt="Slide 1"></div>
                <div class="slide"><img src="fotot/LSD01-13-2000x2000.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="fotot/LSD01-15-2000x2000.jpg" alt="Slide 3"></div>
                <div class="slide"><img src="fotot/LT34-09412-2000x2000.jpg" alt="Slide 4"></div>
            </div>
        </div>
        <div class="button-container">
            <button class="prev">Previous</button>
            <button class="next">Next</button>
        </div>
    </div>
</section>


    <section class="main-content container">
        <h2>Informacione rreth kontaktit</h2>
        <p>Emaili: info@lampworld.com</p>
        <p>Numri tel: +383 (45) 356-776</p>

        <section class="contact-form container">
            <h2>Kontakto</h2>
            <form>
                <label for="name">Emri Juaj:</label>
                <input type="text" placeholder="Emri" id="name" name="name" required>

                <label for="email">Email-in:</label>
                <input type="email" placeholder="Email-in" id="email" name="email" required autofocus>

                <label for="message">Kerkesa Juaj:</label>
                <textarea id="message" placeholder="Shkruaj Ketu" name="message" rows="4" required></textarea>
            </form>
            <button type="button" onclick="validateForm()">Dergo Kerkesen</button>
            <p id="errorMessage"></p>
        </section>
    </section>

    <footer>
    <div class="copyright">
                Copyright © 2023 Lamp. All Rights Reserved.
            </div>
    </footer>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isEmailValid = emailRegex.test(email);

            var errorMessageElement = document.getElementById('errorMessage');

            if (name === "" || email === "" || message === "") {
                alert("Ju lutem plotesoni te gjitha fushat");
            } else {
                alert("Formulari u dergua me sukses!");
            }
        }

        // Add this JavaScript to your existing script tag
document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slide");
    let sliderContainer = document.querySelector(".slider-container");
    let currentSlide = 0;

    function showSlide(n) {
        slides[currentSlide].classList.remove("active");
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add("active");
        sliderContainer.scrollLeft = slides[currentSlide].offsetLeft;
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Show the first slide initially
    showSlide(currentSlide);

    // Automatic slideshow
    setInterval(nextSlide, 3000); // Change slide every 3 seconds

    // Button event listeners
    document.querySelector(".next").addEventListener("click", nextSlide);
    document.querySelector(".prev").addEventListener("click", prevSlide);
});

    </script>

</body>

</html>