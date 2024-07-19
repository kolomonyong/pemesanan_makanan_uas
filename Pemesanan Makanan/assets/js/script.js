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
    document.getElementById('checkoutModal').style.display = 'block';
}

function submitCheckout() {
    const tableNumber = document.getElementById('tableNumber').value;
    const customerName = document.getElementById('customerName').value;

    if (!tableNumber || !customerName) {
        alert("Nomor Meja dan Nama Pelanggan harus diisi!");
        return;
    }

    const data = {
        table_number: tableNumber,
        customer_name: customerName,
        cart: cart
    };

    fetch('checkout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.redirected) {
            window.location.href = response.url;
        } else {
            response.json().then(data => {
                alert(data.message || "Order gagal.");
            });
        }
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('checkoutModal');
    const closeModal = document.getElementsByClassName('close')[0];

    closeModal.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
});
