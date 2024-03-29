<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamp</title>
    <link rel="icon" type="image/x-icon" href="fotot/logo1.jpg">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="hero">
        <nav>
            <img src="fotot/logo.jpg" class="logo">
            <ul>
                <li><a href="kryefaqja.php">Kryefaqja</a></li>
                <li><a href="koleksioni.php">Koleksioni</a></li>
                <li><a href="login.php">Kyqu</a></li>
                <li> <a href="Kontakti.html">Kontakti</a></li>
            </ul>
            <button type="button" onclick="toggleBtn()" id="btn"><span></span></button>
        </nav>
        <div class="lamp-container">
            <img src="fotot/lamp.png" class="lamp">
            <img src="fotot/light.png" class="light" id="light">
        </div>
        <div class="text-container">
            <h1>Te Fundit<br>nga Bota e Llambave</h1>
            <br>
            <p>Kjo është llamba e parë nga kompania jonë. <br> Ne po bëjmë një koleksion të madh të llambave moderne në
                të gjitha kategoritë nga përdorimi në shtëpi deri tek përdorimi në zyrë.</p>
            <a href="koleksioni.php">Shiko Koleksionin</a>

            <div class="control">
                <p>04</p>
                <div class="line"><span></span></div>
                <p>05</p>
            </div>
        </div>
        <footer>
            <div class="copyright">
                Copyright © 2023 Lamp. All Rights Reserved.
            </div>
        </footer>
    </div>


    <script>
        var btn = document.getElementById("btn");
        var light = document.getElementById("light");

        function toggleBtn() {
            btn.classList.toggle("active");
            light.classList.toggle("on");
        }

    </script>
</body>

</html>