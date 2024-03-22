<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="AdminPanel.css" />
  <title>Koleksioni</title>
  <link rel="icon" type="image/x-icon" href="fotot/logo1.jpg" />
</head>

<body>
  <header class="hero">
    <nav>
      <img src="fotot/logo1.jpg" alt="Logo" class="logo" />
      <ul>
        <li><a href="Kryefaqja.php">Kryefaqja</a></li>
        <li><a href="koleksioni.php">Koleksioni</a></li>
        <li><a href="login.php">Kyqu</a></li>
        <li><a href="Kontakti.html">Kontakti</a></li>
      </ul>
    </nav>
  </header>
  <h2>Koleksioni</h2>
  <div class="slider-container">
  </div>

  <div id="uploadForm" style="display: none">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Title" />
      <input type="text" name="description" placeholder="Description" />
      <input type="file" name="image" />
      <input type="submit" value="Upload Image" name="submit" />
    </form>
  </div>

  <div class="btn">
    <button class="prev">Previous</button>
    <button class="next">Next</button>
    <button class="add">Add</button>
    <button class="updt">Update</button>
    <button class="dlt">Delete</button>
  </div>

  <footer>
    <div class="copyright">Copyright © 2023 Lamp. All Rights Reserved.</div>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let slideIndex = 0;
      let slideInterval;
      const slidesContainer = document.querySelector(".slider-container");
      const prevBtn = document.querySelector(".prev");
      const nextBtn = document.querySelector(".next");
      const deleteBtn = document.querySelector(".dlt");
      const updateBtn = document.querySelector(".updt"); // Added Update button
      const addBtn = document.querySelector(".add"); // Added Add button

      function startSlideShow() {
        slideInterval = setInterval(nextSlide, 3000);
      }

      function stopSlideShow() {
        clearInterval(slideInterval);
      }

      function showSlides() {
        const url = "get_descriptions.php?_=" + new Date().getTime();

        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            let slidesHTML = "";

            data.forEach((item, index) => {
              slidesHTML += `<div class="slide" style="display: ${index === slideIndex ? "block" : "none"
                };" data-id="${item.id}">
                <img src="${item.image}" alt="slide ${index + 1}" />
                <div class="desc">${item.description}</div>
              </div>`;
            });

            slidesContainer.innerHTML = slidesHTML;
          })
          .catch((error) =>
            console.error("Error fetching descriptions:", error)
          );
      }

      function prevSlide() {
        slideIndex--;
        if (slideIndex < 0) {
          slideIndex = slidesContainer.children.length - 1;
        }
        showSlides();
      }

      function nextSlide() {
        slideIndex++;
        if (slideIndex >= slidesContainer.children.length) {
          slideIndex = 0;
        }
        showSlides();
      }

      function deleteSlide() {
        // Stop the slideshow
        stopSlideShow();

        // Show confirmation dialog
        const confirmDelete = confirm(
          "Are you sure you want to delete this slide?"
        );
        if (confirmDelete) {
          // Get the ID of the slide from the data-id attribute
          const slideId = slidesContainer.children[slideIndex].dataset.id;

          console.log("slideIndex", slideIndex); // Add this line
          console.log("data-id", slidesContainer.children[slideIndex].dataset.id); // Add this line

          fetch("images.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `action=delete&slideIndex=${slideId}`,
          })
            .then((response) => response.text())
            .then((result) => {
              console.log(result);
              showSlides();
            })
            .catch((error) => console.error("Error deleting slide:", error));
        }

        // Restart the slideshow
        startSlideShow();
      }

      function updateSlide() {
        // Stop the slideshow
        stopSlideShow();

        // Get the ID of the slide from the data-id attribute
        const slideId = slidesContainer.children[slideIndex].dataset.id;

        // Prompt the user for the new description
        const newDescription = prompt("Enter new description:");

        // Send AJAX request to update the slide
        fetch("images.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `action=update&slideId=${slideId}&newDescription=${newDescription}`,
        })
          .then((response) => response.text())
          .then((result) => {
            console.log(result);
            // Fetch the updated data and re-render the slides after a delay
            setTimeout(showSlides, 1000);
          })
          .catch((error) => console.error("Error updating slide:", error));

        // Restart the slideshow
        startSlideShow();
      }

      function toggleUploadForm() {
        var form = document.getElementById("uploadForm");
        if (form.style.display === "none") {
          form.style.display = "block";
        } else {
          form.style.display = "none";
        }
      }

      prevBtn.addEventListener("click", prevSlide);
      nextBtn.addEventListener("click", nextSlide);
      deleteBtn.addEventListener("click", deleteSlide);
      updateBtn.addEventListener("click", updateSlide);
      addBtn.addEventListener("click", toggleUploadForm);

      startSlideShow();

      showSlides();
    });
  </script>
</body>

</html>