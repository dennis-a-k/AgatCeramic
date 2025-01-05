document.addEventListener("DOMContentLoaded", function () {
    initializeCartButtons();
    initializeQuantityControls();
    initializeOffcanvasCart();
});

function initializeCartButtons() {
    // Добавление в корзину
    const addToCartButtons = document.querySelectorAll(".add-cart");
    addToCartButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = this.dataset.productId;
            const quantityInput =
                this.closest(".pro-details-quality")?.querySelector(
                    ".cart-plus-minus-box"
                ) || document.querySelector(".cart-plus-minus-box");
            const quantity = quantityInput ? quantityInput.value : 1;

            addToCart(productId, quantity);
        });
    });

    // Обновление количества в корзине
    const quantityInputs = document.querySelectorAll(".cart-plus-minus-box");
    quantityInputs.forEach((input) => {
        if (input.closest(".table-content")) {
            // проверяем, что это страница корзины
            input.addEventListener("change", function () {
                const productId = this.closest("tr").dataset.productId;
                updateCartQuantity(productId, this.value);
            });
        }
    });

    // Удаление из корзины
    const removeButtons = document.querySelectorAll(".product-remove a");
    removeButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const productId = this.closest("tr").dataset.productId;
            removeFromCart(productId);
        });
    });
}

function initializeQuantityControls() {
    const quantityControls = document.querySelectorAll(".cart-plus-minus");

    quantityControls.forEach((control) => {
        const input = control.querySelector(".cart-plus-minus-box");
        if (!input) return;

        // Создаем кнопки +/-
        const minusBtn = document.createElement("div");
        const plusBtn = document.createElement("div");

        minusBtn.className = "dec qtybutton";
        minusBtn.textContent = "-";
        plusBtn.className = "inc qtybutton";
        plusBtn.textContent = "+";

        input.parentNode.insertBefore(minusBtn, input);
        input.parentNode.appendChild(plusBtn);

        // Обработчики кнопок
        minusBtn.addEventListener("click", () => updateQuantity(input, -1));
        plusBtn.addEventListener("click", () => updateQuantity(input, 1));
    });
}

function updateQuantity(input, change) {
    let value = parseInt(input.value);
    value = Math.max(1, value + change);
    input.value = value;

    // Если это страница корзины, обновляем количество
    if (input.closest(".table-content")) {
        const productId = input.closest("tr").dataset.productId;
        updateCartQuantity(productId, value);
    }
}

function addToCart(productId, quantity) {
    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity }),
    })
        .then((response) => response.json())
        .then((data) => {
            showNotification(data.message);
            updateCartCount(data.cart_count);
            updateOffcanvasCart();
        })
        .catch((error) => console.error("Ошибка:", error));
}

function updateCartQuantity(productId, quantity) {
    fetch("/cart/update", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity }),
    })
        .then((response) => response.json())
        .then((data) => {
            updateCartTotal(data.total);
            updateProductSubtotal(productId, quantity);
            updateOffcanvasCart();
        })
        .catch((error) => console.error("Ошибка:", error));
}

function removeFromCart(productId) {
    fetch("/cart/remove", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({ product_id: productId }),
    })
        .then((response) => response.json())
        .then((data) => {
            const row = document.querySelector(
                `tr[data-product-id="${productId}"]`
            );
            if (row) {
                row.remove();
            }
            updateCartTotal(data.total);
            updateCartCount(data.cart_count);
            showNotification(data.message);
            updateOffcanvasCart();

            // Если корзина пуста, перезагрузите страницу для отображения сообщения о пустой корзине
            if (window.location.pathname === "/cart" && data.cart_count === 0) {
                window.location.reload();
            }
        })
        .catch((error) => console.error("Ошибка:", error));
}

function showNotification(message) {
    const notification = document.createElement("div");
    notification.className = "cart-notification";
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function updateCartCount(count) {
    const cartCounter = document.querySelector(".product-subtotal");
    const cartIcon = document.querySelector(".header-action-btn-cart div");

    if (cartCounter) {
        cartCounter.textContent = count;
    }

    if (!cartIcon) return;

    let cartCounterGoods = cartIcon.querySelector(".header-action-num");

    if (count > 0) {
        // Если счетчик не существует, создаем его
        if (!cartCounterGoods) {
            cartCounterGoods = document.createElement("span");
            cartCounterGoods.className = "header-action-num";
            cartIcon.appendChild(cartCounterGoods);
        }
        // Обновляем значение
        cartCounterGoods.textContent = count.toString();
    } else {
        // Если count равен 0 и счетчик существует, удаляем его
        if (cartCounterGoods) {
            cartCounterGoods.remove();
        }
    }
}

function updateCartTotal(total) {
    const cartTotalElement = document.querySelector(".cart-total");
    if (cartTotalElement) {
        cartTotalElement.textContent = `${total} ₽`;
    }
}

function updateProductSubtotal(productId, quantity) {
    const row = document.querySelector(`tr[data-product-id="${productId}"]`);
    if (row) {
        const productSubtotal = row.querySelector(".product-subtotal");
        const productPrice = parseFloat(
            row.querySelector(".product-price-cart .amount").textContent
        );
        if (productSubtotal && !isNaN(productPrice)) {
            const itemTotal = productPrice * quantity;
            productSubtotal.textContent = `${itemTotal.toFixed(1)} ₽`;
        }
    }
}

function initializeOffcanvasCart() {
    const cartButton = document.querySelector('a[href="#offcanvas-cart"]');
    if (cartButton) {
        cartButton.addEventListener("click", function (e) {
            updateOffcanvasCart();
        });
    }
}

// Функция обновления содержимого offcanvas корзины
function updateOffcanvasCart() {
    fetch("/cart/offcanvas", {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((response) => response.text())
        .then((html) => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, "text/html");
            const newCart = doc.querySelector("#offcanvas-cart");

            if (newCart) {
                const currentCart = document.querySelector("#offcanvas-cart");
                currentCart.innerHTML = newCart.innerHTML;

                // Переинициализируем обработчики событий внутри корзины
                initializeOffcanvasEvents();
            }
        });
}

// Инициализация событий внутри offcanvas корзины
function initializeOffcanvasEvents() {
    // Удаление товаров из корзины
    const removeButtons = document.querySelectorAll("#offcanvas-cart .remove");
    removeButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const productId = this.closest("li").dataset.productId;
            removeFromCart(productId);
        });
    });

    // Обработчик закрытия корзины
    const closeButton = document.querySelector(
        "#offcanvas-cart .offcanvas-close"
    );
    if (closeButton) {
        closeButton.addEventListener("click", function (e) {
            e.preventDefault();
            document.body.classList.remove("offcanvas-open");
            document
                .querySelector("#offcanvas-cart")
                .classList.remove("offcanvas-open");
            document.querySelector(".offcanvas-overlay").style.display = "none";
            document
                .querySelector(".offcanvas-overlay")
                .classList.remove("active");
        });
    }
}
