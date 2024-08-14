const cartTable = document.getElementById('cart');
const total = document.getElementById('total');
const checkoutButton = document.querySelector('.checkout-button');

window.addEventListener('load', function () {
  updateCart();
});

function updateCart() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  let tableRows = '';
  let cartTotal = 0;

  if (cart.length === 0) {
    checkoutButton.style.display = 'none';
    console.log("catt is empty");
  } else {
    checkoutButton.style.display = 'inline-block';
  }

  cart.forEach(function (product, index) {
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