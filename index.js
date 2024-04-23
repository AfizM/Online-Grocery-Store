// If the window needs to be opened with cart open
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const showCartModal = urlParams.get('showCartModal');
    if(showCartModal === 'true') {
        $('#shoppingListModal').modal('show');
    }
});

function toggleSubcategories(button) {
    const subCategories = button.nextElementSibling;
    subCategories.classList.toggle("open");
}

// Get products based on what category clicked
$("a.category-link").click(function(e) {
    e.preventDefault(); 
    var category = $(this).text().trim(); 
    getProducts(category); 
});

$(".category-item").click(function(e) {
    e.preventDefault(); 
    var itemText = $(this).text().trim();
    getSearchedProducts(itemText); 
});


$("#openButton").click(function() {
    getCartEmpty();
});

$("#searchButton").click(function() {
    var keyword = $("#searchInput").val().trim(); 
    getSearchedProducts(keyword); 
});

$("#submitOrder").click(function() {
    window.location.href = "deliveryformpage.php";
});

function getProducts(category) {
    $.ajax({
        url: "get_products.php",
        type: "GET",
        data: {
            category: category
        },
        success: function(response) {
            // Update the cards section with the products gotten
            $(".cards").html(response); 
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function getSearchedProducts(keyword) {
    $.ajax({
        url: "get_products.php",
        type: "GET",
        data: {
            keyword: keyword
        },
        success: function(response) {
            $(".cards").html(response); 
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function getCartItems() {
    let totalPrice = 0; 
    $.ajax({
        url: 'get_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Clear previous cart items
            $('#cartItemsContainer').empty();
            response.forEach(function(item) {
                var cardHtml = '<div class="card mb-3">';
                cardHtml += '<img src="img/' + item.productImage + '" class="card-img-top " alt="' + item.productName + '">';
                cardHtml += '<div class="card-body">';
                cardHtml += '<h5 class="card-title">' + item.productName + '</h5>';
                cardHtml += '<p class="card-text"><strong>Price: </strong>$' + item.productPrice + '</p>';
                cardHtml += '<p class="card-text"><strong>Unit Quantity: </strong>' + item.unitQuantity + '</p>';
                cardHtml += '<p class="card-text"><strong>Quantity: </strong>' + item.quantity + '</p>';
                cardHtml += '<div class="input-group">';
                cardHtml += '<input type="number" id="quantityInput_' + item.productId + '" class="form-control" value="' + item.quantity + '">';
                cardHtml += '<div class="input-group-append">';
                cardHtml += '<button class="btn btn-primary" type="button" onclick="updateCartItemQuantity(' + item.productId + ', document.getElementById(\'quantityInput_' + item.productId + '\').value)">Update Quantity</button>';
                cardHtml += '</div>';
                cardHtml += '</div>';
                cardHtml += '<button type="button" class="btn btn-danger" onclick="removeFromCart(' + item.productId + ')">Remove Item</button>';
                cardHtml += '</div>';
                cardHtml += '</div>';
                
                $('#cartItemsContainer').append(cardHtml);
                totalPrice += parseFloat(item.productPrice) * parseInt(item.quantity);
            });
            $('#totalPriceContainer').text('Total Price: $' + totalPrice.toFixed(2));
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


function getCartEmpty() {
    $.ajax({
        url: 'cart_empty.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                console.log("The shopping cart is empty.");
                $("#submitOrder").prop("disabled", true);
            } else {
                console.log("The shopping cart is not empty.");
                $("#submitOrder").prop("disabled", false);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function addToCart(productId, productName, productPrice, productImage, unitQuantity) {
    $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: {
            productId: productId,
            productName: productName,
            productPrice: productPrice,
            productImage: productImage,
            unitQuantity: unitQuantity
        },
        dataType: 'json', 
        success: function(response) {
            if(response.success) {
                getCartItems();
            } else {
                console.error('Failed to add item to cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function removeFromCart(productId) {
    console.log(productId);
    $.ajax({
        url: 'remove_from_cart.php',
        type: 'POST',
        data: {
            productId: productId
        },
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                // Reload cart
                getCartItems();
                getCartEmpty()
            } else {
                console.error('Failed to remove item from cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function updateCartItemQuantity(productId, quantity) {
    $.ajax({
        url: 'update_cart_item_quantity.php',
        type: 'POST',
        data: {
            productId: productId,
            quantity: quantity
        },
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                getCartItems();
                getCartEmpty()
            } else {
                console.error('Failed to update item quantity');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function clearCart() {
    $.ajax({
        url: 'clear_cart.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                getCartItems();
                getCartEmpty()
            } else {
                console.error('Failed to clear the shopping cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
// Call getCartItems initially to load cart items when the page loads
$(document).ready(function() {
    getCartItems();
});
