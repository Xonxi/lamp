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
    <footer>
        <div class="copyright">
            Copyright © 2023 Lamp. All Rights Reserved.
        </div>
    </footer>
    <script>
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

            showSlide(currentSlide);

            setInterval(nextSlide, 3000);

            document.querySelector(".next").addEventListener("click", nextSlide);
            document.querySelector(".prev").addEventListener("click", prevSlide);
        });

    </script>

</body>

</html>