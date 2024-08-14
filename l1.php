<?php
require_once "header.php";
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col1">
                <div class="product">
                    <img src="img/l1.jpg" alt="product" width="100%">

                    <div class="col2">
                        <h1>RedmiBook 15 Pro</h1>
                        <h4>INR 46900</h4>
                        <br>
                        <h3>Product Details</h3>
                        <p>
                            <ul>
                                <li> i5 11th Gen </li>
                                <li> Iris Xe Graphics</li>
                                <li> 8GB RAM </li>
                                <li> 512GB SSD </li>
                                <li> 1.8 kg </li>
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
            name: "RedmiBook 15 Pro",
            price: 46900, // Updated to a numeric value
            image: "img/l1.jpg",
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
