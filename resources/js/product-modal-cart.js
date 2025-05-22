document.addEventListener("DOMContentLoaded", function () {
    const BASE_URL = window.location.origin;

    const buttons = document.querySelectorAll(".quickview");

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            document.querySelector(".cart-plus-minus-box").value = 1;

            const productId = this.getAttribute("data-id");

            document.querySelector("#modalProduct .modal-body h2").innerText =
                "Загрузка...";
            document.querySelector(
                "#modalProduct .modal-body .new-price"
            ).innerText = "";
            document.querySelector(
                "#modalProduct .modal-body .swiper-container .swiper-wrapper"
            ).innerHTML = "";

            fetch(`${BASE_URL}/api/product/${productId}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Ошибка загрузки данных");
                    }
                    return response.json();
                })
                .then((data) => {
                    const title = data.category.subtitle + ' ' + data.title || "---";
                    const price = +data.price || "---";
                    const formattedPrice = price
                        .toLocaleString("ru-RU", {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2,
                        })
                        .replace(",", ".");
                    const sku = data.sku || "---";
                    const unit =
                        data.unit === "шт"
                            ? "<span>шт.</span>"
                            : "<span>м<sup>2</sup></span>";
                    const collection = data.collection
                        ? data.collection.title
                        : "---";
                    const brand = data.brand ? data.brand.title : "---";
                    const images =
                        data.images && data.images.length > 0
                            ? data.images
                            : [{ title: null }];
                    const elementId = document.querySelector(
                        "#modalProduct .pro-details-cart .add-cart"
                    );

                    document.querySelector(
                        "#modalProduct .modal-body h2"
                    ).innerText = title;
                    document.querySelector(
                        "#modalProduct .modal-body .new-price"
                    ).innerText = `${formattedPrice} ₽`;
                    document.querySelector(
                        "#modalProduct .modal-body .new-sku"
                    ).innerText = sku;
                    document.querySelector(
                        "#modalProduct .modal-body .new-unit"
                    ).innerHTML = unit;
                    document.querySelector(
                        "#modalProduct .modal-body .new-collection"
                    ).innerText = collection;
                    document.querySelector(
                        "#modalProduct .modal-body .new-brand"
                    ).innerText = brand;
                    elementId.setAttribute("data-product-id", data.id);

                    document.querySelector(
                        "#modalProduct .modal-body .swiper-container .swiper-wrapper"
                    ).innerHTML = images
                        .map(
                            (image) =>
                                `<div class="swiper-slide" style="border: none;"><img class="img-responsive m-auto" src="${image.title
                                    ? `${BASE_URL}/storage/images/${image.title}`
                                    : `${BASE_URL}/assets/images/stock/stock-image.png`
                                }" alt="${image.title
                                    ? image.title
                                    : "Изображение по умолчанию"
                                }"></div>`
                        )
                        .join("");
                })
                .catch((error) => {
                    console.error(error);
                    document.querySelector(
                        "#modalProduct .modal-body h2"
                    ).innerText = "Ошибка загрузки данных";
                });
        });
    });
});
