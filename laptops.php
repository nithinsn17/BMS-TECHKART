<?php
require_once "header.php";
?>
<style>
    /* Styles for the slider bars */
    input[type="range"] {
        width: 15%;
        height: 10px; /* Adjust the height to make it thinner */
        -webkit-appearance: none;
        appearance: none;
        background: #ccc;
        border: 1px solid #666;
        border-radius: 5px; /* Adjust the border-radius for a smaller appearance */
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px; /* Adjust the width to make it smaller */
        height: 16px; /* Adjust the height to make it smaller */
        background: black;
        border: 1px black;
        border-radius: 50%;
        cursor: pointer;
    }

    /* Styles for the Apply Filter button */
    #apply-filter {
        background: black;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    #apply-filter:hover {
        background: red;
    }
</style>



<section class="container1 section-3">
    <h1 class="title justify-center item-center flex">LAPTOPS</h1>
    <div class="price-filter">
        <label for="min-price">Min Price:</label>
        <input type="range" id="min-price" min="0" max="100000">
        <span id="min-price-value">0</span>

        <label for="max-price">Max Price:</label>
        <input type="range" id="max-price" min="0" max="100000">
        <span id="max-price-value">10000</span>

        <button id="apply-filter">Apply Filter</button>
    </div>
  <div class=" featured">
    <div class="  space-around categories">

      <div class="hover img-4"><a style="color: black;" href="l1.php">
          <img src="img/l1.jpg" alt="">
          <h4>RedmiBook 15 Pro</h4>
          <p>price:₹46,900</p>
        </a>

      </div>
      <div class=" hover img-5"><a style="color: black;" href="l2.php">
          <img src="img/l2.jpg" alt="">
          <h4>Mi NoteBook Ultra Win 11
          </h4>
          <p>price:₹63,999</p>
        </a>

      </div>
      <div class=" hover img-8"><a style="color: black;" href="l3.php">
          <img src="img/l3.jpg" alt="">
          <h4>Asus Zenbook 14</h4>
          <p>price:₹89,999</p>
        </a>

      </div>
      <div class=" hover img-7">
        <a style="color: black;" href="l4.php">
          <img src="img/l4.webp" alt="">
          <h4>
            MSI Gaming GF63 Thin, 11th Gen</h4>
          <p>price:₹69,990</p>
        </a>
      </div>
      <div class="hover img-4"><a style="color: black;" href="l5.php">
          <img src="img/l5.webp" alt="">
          <h4>
            Apple MacBook Pro </h4>
          <p>price:₹69,400</p>
        </a>

      </div>
      <div class="hover img-4"><a style="color: black;" href="l6.php">
          <img src="img/17.jpg" alt="">
          <h4>ASUS ROG Strix G17, 17.3-inch </h4>
          <p>price:₹89,990</p>
        </a>

      </div>
      <div class="hover img-4"><a style="color: black;" href="l7.php">
          <img src="img/18.jpg" alt="">
          <h4>MacBook Air - Space Grey</h4>
          <p>price:₹1,04,990.</p>
        </a>

      </div>
      <div class="hover img-4"><a style="color: black;" href="l8.php">
          <img src="img/l6.webp" alt="">
          <h4>HP Pavilion </h4>
          <p>price:₹3,590</p>
        </a>

      </div>

    </div>
  </div>
</section>

<footer>
    <p>Copyright &copy; BMSTechKart.com </p>
</footer>

</main>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Retrieve filter values from local storage if available
        const storedMinPrice = localStorage.getItem("minPrice");
        const storedMaxPrice = localStorage.getItem("maxPrice");

        // Initialize sliders with stored or default values
        const minPriceSlider = document.getElementById("min-price");
        const maxPriceSlider = document.getElementById("max-price");
        const minPriceValue = document.getElementById("min-price-value");
        const maxPriceValue = document.getElementById("max-price-value");

        if (storedMinPrice) {
            minPriceSlider.value = storedMinPrice;
        }
        if (storedMaxPrice) {
            maxPriceSlider.value = storedMaxPrice;
        }

        // Function to update slider values and store in local storage
        function updateSliderValues() {
            const minPrice = parseFloat(minPriceSlider.value);
            const maxPrice = parseFloat(maxPriceSlider.value);
            minPriceValue.textContent = minPrice;
            maxPriceValue.textContent = maxPrice;

            // Store filter values in local storage
            localStorage.setItem("minPrice", minPrice);
            localStorage.setItem("maxPrice", maxPrice);
        }

        // Initialize sliders and apply filter
        updateSliderValues();
        filterProducts();

        // Add event listeners for slider changes
        minPriceSlider.addEventListener("input", updateSliderValues);
        maxPriceSlider.addEventListener("input", updateSliderValues);

        // Apply filter when the "Apply Filter" button is clicked
        const applyFilterButton = document.getElementById("apply-filter");
        applyFilterButton.addEventListener("click", filterProducts);

        // Function to filter products
        function filterProducts() {
            const minPrice = parseFloat(minPriceSlider.value);
            const maxPrice = parseFloat(maxPriceSlider.value);

            const products = document.querySelectorAll(".hover");

            products.forEach(product => {
                const priceText = product.querySelector("p").textContent;
                const priceCleaned = parseFloat(priceText.replace(/[^\d.]/g, ''));

                if (!isNaN(priceCleaned) && priceCleaned >= minPrice && priceCleaned <= maxPrice) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }
    });
</script>



</html>