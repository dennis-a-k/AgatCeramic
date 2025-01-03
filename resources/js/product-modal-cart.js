document.addEventListener("DOMContentLoaded", function () {
    // Add base URL constant at the top
    const BASE_URL = window.location.origin;

    const buttons = document.querySelectorAll(".quickview");

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-id");

            // Clear modal content
            document.querySelector("#modalProduct .modal-body h2").innerText =
                "Загрузка...";
            document.querySelector(
                "#modalProduct .modal-body .new-price"
            ).innerText = "";
            document.querySelector(
                "#modalProduct .modal-body .swiper-container .swiper-wrapper"
            ).innerHTML = "";

            // AJAX request
            fetch(`${BASE_URL}/api/product/${productId}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Ошибка загрузки данных");
                    }
                    return response.json();
                })
                .then((data) => {
                    const title = data.title || "---";
                    const price = data.price || "---";
                    const sku = data.sku || "---";
                    const unit =
                        data.unit === "шт"
                            ? "<span>шт.</span>"
                            : "<span>м<sup>2</sup></span>";
                    const collection = data.collection
                        ? data.collection.title
                        : "---";
                    const brand = data.brand ? data.brand.title : "---";
                    const description = data.description || "---";
                    const images =
                        data.images && data.images.length > 0
                            ? data.images
                            : [{ title: null }];

                    // Update modal content
                    document.querySelector(
                        "#modalProduct .modal-body h2"
                    ).innerText = title;
                    document.querySelector(
                        "#modalProduct .modal-body .new-price"
                    ).innerText = `${price} ₽`;
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
                    document.querySelector(
                        "#modalProduct .modal-body .new-description"
                    ).innerText = description;

                    // Update images with correct base URL
                    document.querySelector(
                        "#modalProduct .modal-body .swiper-container .swiper-wrapper"
                    ).innerHTML = images
                        .map(
                            (image) => `
                            <div class="swiper-slide" style="border: none;">
                                <img class="img-responsive m-auto"
                                    src="${
                                        image.title
                                            ? `${BASE_URL}/storage/images/${image.title}`
                                            : `${BASE_URL}/assets/images/stock/stock-image.png`
                                    }"
                                    alt="${
                                        image.title
                                            ? image.title
                                            : "Изображение по умолчанию"
                                    }">
                            </div>
                        `
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
