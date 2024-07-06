let cart = [];

function addToCart(id, name, price) {
    const item = cart.find(menu => menu.id === id);
    if (item) {
        item.quantity++;
    } else {
        cart.push({ id: id, name: name, price: price, quantity: 1 });
    }
    console.log(cart);
    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById('cartItems');
    const cartCount = document.getElementById('cartCount');
    const cartTotal = document.getElementById('cartTotal');
    
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - Quantity: ${item.quantity} - Price: ${(item.price * item.quantity).toFixed(2)}`;
        cartItems.appendChild(li);
        total += item.price * item.quantity;
    });

    console.log("debug", cart)
    cartCount.textContent = cart.length;
    cartTotal.textContent = total.toFixed(2);
}

function toggleCart() {
    const cartDropdown = document.getElementById('cartDropdown');
    cartDropdown.classList.toggle('active');
}

function checkout() {
    if (cart.length === 0) {
        alert("Keranjangmu Kosong!");
        return;
    }
    window.location.href = 'cart.php'; 
}
