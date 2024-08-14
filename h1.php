<?php
require_once "header.php";
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col1">
                <div class="product">
                    <img src="img/h1.jpg" alt="product" width="100%">

                    <div class="col2">
                        <label for="item">item:</label>
                        <h1>Skullcandy Hesh ANC is one of the only headphones on the market that delivers full sound and Active Noise Cancelling for music-lovers on a budget. Anchored by big, 40mm drivers ...</h1>
                        <h4>INR 6599 Rupees</h4>
                        <br>
                        <h3>Product Details</h3>
                        <p>
                        <ul>
                            <li>lightweight</li>
                            <li> portable headphones </li>
                            <li>These sports-oriented headphones</li>
                            <li>rated IP55 for dust and water resistance.</li>
                            <li>Very stable fit.</li>
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
            name: "Skullcandy Hesh ANC ",
            price: 6599,
            image: "img/h1.jpg",
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
