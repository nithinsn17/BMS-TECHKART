<?php
require_once "header.php";
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col1">
                <div class="product">
                    <img src="img/m2.png" alt="product" width="100%">

                    <div class="col2">
                        <h1>OnePlus 10 Pro 5G.</h1>
                        <h4>INR 61999 Rupees</h4>
                        <br>
                        <h3>Product Details</h3>
                        <p>
                        <ul>
                            <li>120Hz Fluid Display</li>
                            <li>80W superfast charging</li>
                            <li>50W wireless charging</li>
                            <li>Smooth & Clean OS</li>
                            <li>vision made smart</li>
                        </ul>
                        </p>
                        <br> 
                        <br>
                        <br>

                        <br>
                          <button class="button" id="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<footer>
    <p>Copyright &copy; BMSTechKart.com </p>
</footer>
</main>
<style>
    * {
        box-sizing: border-box;
    }

    section {
        margin: auto;
        padding-top: 20px;
    }

    img {
        border-radius: 0;
        float: left;
    }

    .col1 img {
        padding-right: 50px;
    }

    .col2 {
        margin: auto;
        padding: 0 20%;
    }

    .logo_container img {
        border-radius: 500px;
    }

    .button {
        background-color: #182179;
        border: none;
        color: white;
        padding: 5px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 30px;
    }
</style>
<script>
    const addToCartButton = document.getElementById("add-to-cart");
    addToCartButton.addEventListener("click", function() {
        const product = {
            name: "OnePlus 10 Pro 5G ",
            price: 61999,
            image: "img/m2.png",
        };

        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.push(product);
          localStorage.setItem("cart", JSON.stringify(cart));

        // Show an alert to indicate the item has been added to the cart
        alert("Item added to cart!");
    });
    
</script>
</body>

</html>