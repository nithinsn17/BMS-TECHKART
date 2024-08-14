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
    <h1 class="title justify-center item-center flex">MOBILES</h1>
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

      <div class="hover img-4"><a style="color: black;" href="p1.php">
          <img src="img/m1.png" alt="">
          <h4>OnePlus Nord CE 2 Lite 5G</h4>
          <p>price:₹18,900</p>
        </a>
      </div>
      <div class=" hover img-5"><a style="color: black;" href="p2.php">
          <img src="img/13.jpg" alt="">
          <h4>Realme Narzo 50i</h4>
          <p>price:₹9,999</p>
        </a>
      </div>
      <div class=" hover img-8"><a style="color: black;" href="p3.php">
          <img src="img/m2.png" alt="">
          <h4>OnePlus 10 Pro 5G</h4>
          <p>price:₹61,999</p>
        </a>
      </div>
      <div class=" hover img-7"><a style="color: black;" href="p4.php">
          <img src="img/m4.jpg" alt="">
          <h4>Xiaomi 12 Pro 5G</h4>
          <p>price:₹59,999</p>
        </a>
      </div>
      <div class="hover img-4"><a style="color: black;" href="p5.php">
          <img src="img/15.jpg" alt="">
          <h4>Apple iPhone 14 128GB </h4>
          <p>price:₹77,400</p>
        </a>
      </div>
      <div class="hover img-4"><a style="color: black;" href="p6.php">
          <img src="img/m5.jpg" alt="">
          <h4>Xiaomi 11T Pro 5G </h4>
          <p>price:₹39,990</p>
        </a>
      </div>
      <div class="hover img-4"><a style="color: black;" href="p7.php">
          <img src="img/m6.png" alt="">
          <h4>OnePlus Nord 2T 5G</h4>
          <p>price:₹28,990.</p>
        </a>
      </div>
      <div class="hover img-4"><a style="color: black;" href="p8.php">
          <img src="img/19.jpg" alt="">
          <h4>Nokia 5310 Dual SIM </h4>
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