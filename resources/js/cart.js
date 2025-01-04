document.addEventListener("DOMContentLoaded", function () {
    initializeCartButtons();
    initializeQuantityControls();
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
    value = Math.max(1, value + change); // не меньше 1
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
            updateCartCount(data.cart_count); // Добавьте эту строку
            showNotification(data.message);

            // Если корзина пуста, перезагрузите страницу для отображения сообщения о пустой корзине
            if (data.cart_count === 0) {
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
    if (cartCounter) {
        cartCounter.textContent = count;
    }
}

function updateCartTotal(total) {
    const totalElement = document.querySelector(".cart-total");
    if (totalElement) {
        totalElement.textContent = `${total} ₽`;
    }
}
