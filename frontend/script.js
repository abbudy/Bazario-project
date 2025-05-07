
const cart = [];
const cartCountElement = document.getElementById('cart-count');
const cartItemsElement = document.getElementById('cartItems');
const cartTotalElement = document.getElementById('cartTotal');
const cartDropdown = document.getElementById('cartDropdown');
const cartToggle = document.getElementById('cartToggle');

function renderCart() {
  cartItemsElement.innerHTML = '';
  let total = 0;

  cart.forEach(item => {
    const itemEl = document.createElement('div');
    itemEl.textContent = `${item.title} - $${item.price.toFixed(2)}`;
    cartItemsElement.appendChild(itemEl);
    total += item.price;
  });

  cartTotalElement.textContent = total.toFixed(2);
}

document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', () => {
    const title = button.getAttribute('data-title');
    const price = parseFloat(button.getAttribute('data-price'));

    cart.push({ title, price });

    if (cartCountElement) {
      cartCountElement.textContent = cart.length;
    }

    renderCart();

    button.textContent = "Added!";
    button.disabled = true;
    setTimeout(() => {
      button.textContent = "Add to Cart";
      button.disabled = false;
    }, 1500);
  });
});

cartToggle.addEventListener("click", () => {
  cartDropdown.classList.toggle("show");
});

// Optional: close dropdown if click outside
document.addEventListener("click", (e) => {
  if (!document.querySelector(".cart-container").contains(e.target)) {
    cartDropdown.classList.remove("show");
  }
});

const modal = document.getElementById("newsletterModal");
const closeBtn = document.querySelector(".close-btn");

setTimeout(() => {
  modal.style.display = "block";
}, 5000); // Show after 5 seconds

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target == modal) {
    modal.style.display = "none";
  }
});


  
const backToTopBtn = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    backToTopBtn.style.display = 'block';
  } else {
    backToTopBtn.style.display = 'none';
  }
});

backToTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});
  
  
const carousel = document.getElementById('trending-carousel');
let scrollAmount = 0;
let scrollStep = 1;
let maxScroll = carousel.scrollWidth - carousel.clientWidth;

function autoScroll() {
  if (scrollAmount >= maxScroll) {
    scrollAmount = 0;
  } else {
    scrollAmount += scrollStep;
  }
  carousel.scrollTo({
    left: scrollAmount,
    behavior: 'smooth'
  });
}

setInterval(autoScroll, 30); // Scroll speed — lower is faster


  
