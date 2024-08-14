<?php
session_start();
if (!isset($_SESSION["email_id"])) {
  header("location:index.php?error=notloggedin");
}
?>

<?php
require_once "header.php";
?>

<div class="shopping-cart">
  <h1>Shopping Cart</h1>
  <table id="cart">
    <tr>
      <th>Product Image</th>
      <th>Product</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </table>
  <p id="total"></p>

  <a href="checkout.php"> <button class="checkout-button">Checkout</button></a>
</div>

<footer>
  <p>Copyright &copy; BMSTechKart.com </p>
</footer>

<style>
  .shopping-cart {
    width: 80%;
    margin: 0 auto;
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    padding: 10px;
    border: 1px solid #ddd;
  }

  th {
    background-color: #ddd;
    text-align: left;
  }

  td img {
    width: 100px;
    height: 100px;
  }

  .checkout-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
  }

  .checkout-button:hover {
    cursor: pointer;
    background-color: #333;
  }
</style>


<script>
  const cartTable = document.getElementById('cart');
  const total = document.getElementById('total');
  const checkoutButton = document.querySelector('.checkout-button');

  window.addEventListener('load', function() {
    updateCart();
  });

  function updateCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let tableRows = '';
    let cartTotal = 0;

    if (cart.length === 0) {
      checkoutButton.style.display = 'none';
      console.log("cart is empty");
    } else {
      checkoutButton.style.display = 'inline-block';
    }

    cart.forEach(function(product, index) {
      tableRows += `
      <tr>
        <td>
          <img  src="${product.image}" alt="${product.name}">
        </td>
        <td>${product.name}</td>
        <td>INR ${product.price}</td>
        <td>
          <button onclick="removeFromCart(${index})">Remove</button>
        </td>
      </tr>
    `;
      cartTotal += product.price;
    });

    cartTable.innerHTML = tableRows;
    total.textContent = `Total: INR ${cartTotal}`;
  }

  function removeFromCart(index) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
  }
</script>

</body>

</html>