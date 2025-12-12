// Main JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle functionality will be handled by the header component

    // Initialize product carousels
    initProductCarousels();

    // Initialize tooltips for icons
    initTooltips();
});

function initProductCarousels() {
    // This would initialize any product carousels on the page
    // Implementation would depend on the carousel library used
}

function initTooltips() {
    // Initialize tooltips for product ratings and other elements
    const tooltipElements = document.querySelectorAll('[data-tooltip]');

    tooltipElements.forEach(el => {
        el.addEventListener('mouseenter', showTooltip);
        el.addEventListener('mouseleave', hideTooltip);
    });
}

function showTooltip(e) {
    // Show tooltip implementation
}

function hideTooltip(e) {
    // Hide tooltip implementation
}

// Cart functionality
function addToCart(productId) {
    // Add item to cart logic
    console.log(`Product ${productId} added to cart`);
}

// Search functionality
function searchProducts(query) {
    // Search products logic
    console.log(`Searching for: ${query}`);
}








//cart

document.addEventListener('DOMContentLoaded', function() {
    // Quantity buttons functionality
    const quantityButtons = document.querySelectorAll('.flex.items-center.border button');

    quantityButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('span');
            let value = parseInt(input.textContent);

            if (this.textContent === '+') {
                value++;
            } else if (this.textContent === '-' && value > 1) {
                value--;
            }

            input.textContent = value;

            // Here you would typically update the cart total via AJAX
            updateCartTotal();
        });
    });

    // Delete item functionality
    const deleteButtons = document.querySelectorAll('button.text-red-500');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const item = this.closest('.flex-col.sm\\:flex-row');

            // Add animation for removal
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(-30px)';

            // Remove after animation completes
            setTimeout(() => {
                item.remove();
                updateCartTotal();
            }, 300);
        });
    });

    // Coupon code functionality
    const couponButton = document.querySelector('button.bg-blue-600');

    if (couponButton) {
        couponButton.addEventListener('click', function() {
            const couponInput = this.parentElement.querySelector('input');

            if (couponInput.value.trim() === '') {
                alert('لطفا کد تخفیف را وارد کنید');
                return;
            }

            // Here you would typically validate the coupon via AJAX
            alert('کد تخفیف اعمال شد');
            updateCartTotal();
        });
    }

    function updateCartTotal() {
        // This function would calculate the new total based on quantities
        // For demo purposes, we'll just show a message
        console.log('Cart updated');
    }

    // Feather icons replacement
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});



/*------------------cartItem--------------------------*/
class CartItem extends HTMLElement {
    connectedCallback() {
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
            <style>
                :host {
                    display: block;
                    margin-bottom: 1rem;
                    animation: fadeIn 0.5s ease-out forwards;
                }

                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                .cart-item {
                    display: flex;
                    flex-direction: column;
                    gap: 1rem;
                    padding: 1.5rem;
                }

                @media (min-width: 640px) {
                    .cart-item {
                        flex-direction: row;
                    }
                }

                .product-image {
                    width: 8rem;
                    height: 8rem;
                    background-color: #f3f4f6;
                    border-radius: 0.5rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .product-image img {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: contain;
                }

                .product-details {
                    flex-grow: 1;
                }

                .product-title {
                    font-weight: bold;
                    font-size: 1.125rem;
                    margin-bottom: 0.25rem;
                }

                .product-variants {
                    color: #6b7280;
                    font-size: 0.875rem;
                }

                .product-actions {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 1rem;
                }

                .quantity-selector {
                    display: flex;
                    align-items: center;
                    border: 1px solid #d1d5db;
                    border-radius: 0.5rem;
                    overflow: hidden;
                }

                .quantity-btn {
                    padding: 0.25rem 0.75rem;
                    background-color: #f3f4f6;
                    cursor: pointer;
                    transition: background-color 0.2s;
                }

                .quantity-btn:hover {
                    background-color: #e5e7eb;
                }

                .quantity-value {
                    padding: 0 1rem;
                }

                .product-price {
                    color: #3b82f6;
                    font-weight: bold;
                }

                .delete-btn {
                    color: #ef4444;
                    cursor: pointer;
                    transition: color 0.2s;
                }

                .delete-btn:hover {
                    color: #dc2626;
                }
            </style>

            <div class="cart-item">
                <div class="product-image">
                    <img src="${this.getAttribute('image')}" alt="${this.getAttribute('title')}">
                </div>
                <div class="product-details">
                    <div class="flex justify-between">
                        <h3 class="product-title">${this.getAttribute('title')}</h3>
                        <div class="delete-btn">
                            <i data-feather="trash-2"></i>
                        </div>
                    </div>
                    <p class="product-variants">${this.getAttribute('variants')}</p>
                    <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="quantity-btn">+</button>
                            <span class="quantity-value">${this.getAttribute('quantity')}</span>
                            <button class="quantity-btn">-</button>
                        </div>
                        <div class="product-price">
                            ${this.getAttribute('price')}
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Add event listeners
        this.shadowRoot.querySelector('.delete-btn').addEventListener('click', () => {
            this.dispatchEvent(new CustomEvent('remove-item', {
                bubbles: true,
                composed: true,
                detail: { id: this.getAttribute('id') }
            }));
            this.remove();
        });

        const quantityButtons = this.shadowRoot.querySelectorAll('.quantity-btn');
        const quantityValue = this.shadowRoot.querySelector('.quantity-value');

        quantityButtons[0].addEventListener('click', () => {
            let value = parseInt(quantityValue.textContent);
            quantityValue.textContent = value + 1;
            this.dispatchEvent(new CustomEvent('quantity-change', {
                bubbles: true,
                composed: true,
                detail: {
                    id: this.getAttribute('id'),
                    quantity: value + 1
                }
            }));
        });

        quantityButtons[1].addEventListener('click', () => {
            let value = parseInt(quantityValue.textContent);
            if (value > 1) {
                quantityValue.textContent = value - 1;
                this.dispatchEvent(new CustomEvent('quantity-change', {
                    bubbles: true,
                    composed: true,
                    detail: {
                        id: this.getAttribute('id'),
                        quantity: value - 1
                    }
                }));
            }
        });

        // Replace feather icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    }
}

customElements.define('cart-item', CartItem);
