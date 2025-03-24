$(document).ready(function() {
    $('.category-link').on('click', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('id');
        loadProducts(categoryId);
        $(this).addClass('active');
    });

    $('#sort').on('change', function() {
        var categoryId = $('.category-link.active').data('id');
        var orderBy = $(this).val();
        loadProducts(categoryId, orderBy);
    });

    function loadProducts(categoryId = null, orderBy = 'price') {
        var url = new URL(window.location.href);
        if (categoryId) {
            url.searchParams.set('category_id', categoryId);
        } else {
            url.searchParams.delete('category_id');
        }
        url.searchParams.set('order_by', orderBy);
        history.pushState(null, '', url.toString());

        $.ajax({
            url: '/ajax/get_products.php',
            type: 'GET',
            data: {category_id: categoryId, order_by: orderBy},
            success: function(response) {
                $("#products").empty();
                $("#products").append(response);
            },
            error: function (xhr, status, error){
                console.log("Помилка при отриманні даних" + error)
            }
        });
    }

    $(document).on('click', '.buy-button', function() {
        var productId = $(this).data('id');
        $.ajax({
            url: '/ajax/get_product.php',
            type: 'GET',
            data: { id: productId },
            success: function(response) {
                var product = JSON.parse(response);
                $('#modal-product-name').text(product.name);
                $('#modal-product-price').text(product.price + ' $');
                $('#modal-product-date').text(product.created_at);

                // Ініціалізація та відкриття модального вікна
                var buyModal = new bootstrap.Modal(document.getElementById('buyModal'));
                buyModal.show();
            },
            error: function(xhr, status, error) {
                console.error("Помилка при отриманні даних: " + error);
            }
        });
    });
});