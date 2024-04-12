
<?php
session_start(); // Start the session
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Grocery Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css" />

</head>
<body>
<!-- Header -->
<header class="bg-dark text-white py-4">
    <div class="text-center">
        <h1>Online Grocery Store</h1>
    </div>
</header>

<div class="catcontainer">
    <div class="categories">
        <h2>Categories</h2>
        <ul>
            <li>
                <div class="category">
                    <a href="#" class="category-link Frozen">Frozen</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Fish Fingers 500 gram</a></li>
                        <li><a href="#" class="category-item">Fish Fingers 1000 gram</a></li>
                        <li><a href="#" class="category-item">Hamburger Patties Pack 10</a></li>
                        <li><a href="#" class="category-item">Shelled Prawns 250 gram</a></li>
                        <li><a href="#" class="category-item">Tub Ice Cream I Litre</a></li>
                        <li><a href="#" class="category-item">Tub Ice Cream 2 Litre</a></li>
                    </ul>
                </div>
            </li>
              <li>
                <div class="category">
                    <a href="#" class="category-link Medicine">Medicine</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Panadol Pack 24</a></li>
                        <li><a href="#" class="category-item">Panadol Bottle 50</a></li>
                        <li><a href="#" class="category-item">Bath Soap Pack 6</a></li>

                    </ul>
                </div>
                <div class="category">
                    <a href="#" class="category-link Household">Household</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Garbage Bags Small Pack 10</a></li>
                        <li><a href="#" class="category-item">Garbage Bags Large Pack 50</a></li>
                        <li><a href="#" class="category-item">Washing Powder 1000 gram</a></li>
                        <li><a href="#" class="category-item">Laundry Bleach 2 Litre Bottle</a></li>
                    </ul>
                </div>
                <div class="category">
                    <a href="#" class="category-link Dairy">Dairy</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Cheddar Cheese 500 gram</a></li>
                        <li><a href="#" class="category-item">Cheddar Cheese 1000 gram</a></li>
                    </ul>
                </div>
                <div class="category">
                    <a href="#" class="category-link Fruit">Fruit</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Navel Oranges Bag 20</a></li>
                        <li><a href="#" class="category-item">Bananas   </a></li>
                        <li><a href="#" class="category-item">Peaches Kilo</a></li>
                        <li><a href="#" class="category-item">Grapes Kilo</a></li>
                        <li><a href="#" class="category-item">Apples Kilo</a></li>
                    </ul>
                </div>
                <div class="category">
                    <a href="#" class="category-link Beverages">Beverages</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Earl Grey Tea Bags Pack 25</a></li>
                        <li><a href="#" class="category-item">Earl Grey Tea Bags Pack 100</a></li>
                        <li><a href="#" class="category-item">Earl Grey Tea Bags Pack 200</a></li>
                        <li><a href="#" class="category-item">Instant Coffee 200 gram</a></li>
                        <li><a href="#" class="category-item">Instant Coffee 500 gram</a></li>
                    </ul>
                </div>
                <div class="category">
                    <a href="#" class="category-link Pet Food">Pet Food</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#" class="category-item">Dry Dog Food 5 kg Pack</a></li>
                        <li><a href="#" class="category-item">Dry Dog Food 1 kg Pack</a></li>
                        <li><a href="#" class="category-item">Bird Food 500g packet</a></li>
                        <li><a href="#" class="category-item">Cat Food 500g tin</a></li>
                        <li><a href="#" class="category-item">Fish Food 500g packet</a></li>
                    </ul>
                </div>
                
        </ul>
    </div>

    <!-- Main content area -->
    <div class="main-content">
        <h2>Search for product:</h2>
        <div class="input-group mb-3">
            <input
                    type="text"
                    class="form-control"
                     id="searchInput"
                    placeholder="Search Products"
                    aria-label="Search Products"
                    aria-describedby="button-addon2"
            />
            <div class="input-group-append">
                <button
                        class="btn btn-outline-primary"
                        type="button"
                        id="searchButton"
                >
                    Search
                </button>
            </div>

            <button
                    type="button"
                    class="btn btn-primary openshopbutton"
                    data-toggle="modal"
                    data-target="#shoppingListModal"
                    id="openButton"
            >
                Open Shopping Cart
            </button>
        </div>

        <!-- Product Cards -->
        <div class="cards">
            
           
        </div>

        <!-- Shopping list modal -->
        <div
                class="modal fade"
                id="shoppingListModal"
                tabindex="-1"
                aria-labelledby="shoppingListModalLabel"
                aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shoppingListModalLabel">
                            Shopping Cart
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Template card for products -->
                        <div id="cartItemsContainer"></div>
                        <div class= "btm-cart-buttons">
                        <button type="button" class="btn btn-danger cart-btn" onclick="clearCart()">Clear Cart</button>
                        <button type="button" class="btn btn-primary openshopbutton " id="submitOrder" data-toggle="modal">Submit</button>
</div>
<p id="totalPriceContainer"></p>


                    </div>
                    <div class="modal-footer">
                        <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

$(document).ready(function() {
        // Get the URL parameter 'showCartModal'
        const urlParams = new URLSearchParams(window.location.search);
        const showCartModal = urlParams.get('showCartModal');

        // Check if 'showCartModal' is set to 'true'
        if (showCartModal === 'true') {
            // Open the shopping cart modal
            $('#shoppingListModal').modal('show');
        }
    });
            // Function to check if the shopping cart is empty
            // Can do a get request instead
        
        // Handle search button click
        $("#openButton").click(function() {
        fetchCartEmpty();
    });

    $("#submitOrder").click(function() {
        window.location.href = "deliveryform.php";
        
    });

    function fetchCartEmpty() {
    $.ajax({
        url: 'cart_empty.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
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





        function toggleSubcategories(button) {
            const subCategories = button.nextElementSibling;
            subCategories.classList.toggle("open");
        }

        // Function to fetch products for a category
        function fetchProducts(category) {
            $.ajax({
                url: "fetch_products.php",
                type: "GET",
                data: { category: category },
                success: function(response) {
                    $(".cards").html(response); // Update the product cards section with the fetched products
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Function to fetch products based on keyword search
    function searchProducts(keyword) {
        $.ajax({
            url: "fetch_products.php",
            type: "GET",
            data: { keyword: keyword },
            success: function(response) {
                $(".cards").html(response); // Update the product cards section with the search results
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

        // Click event handler for category links
        $(document).ready(function() {
            $("a.category-link").click(function(e) {
                e.preventDefault(); // Prevent default link behavior
                var category = $(this).text().trim(); // Get the category text
                fetchProducts(category); // Fetch products for the selected category
            });
        });

        $(".category-item").click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var itemText = $(this).text().trim(); // Get the sub-category item text
        searchProducts(itemText); // Fetch products based on the sub-category item
    });

        

        // Handle search button click
        $("#searchButton").click(function() {
        var keyword = $("#searchInput").val().trim(); // Get the search keyword
        searchProducts(keyword); // Fetch products based on the search keyword
    });




// Function to add items to the cart
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
        dataType: 'json', // Expect JSON response
        success: function(response) {
            if (response.success) {
                // Cart item added successfully, update the cart items container
                fetchCartItems();
            } else {
                console.error('Failed to add item to cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Function to fetch and display cart items
// Function to fetch and display cart items
function fetchCartItems() {
    let totalPrice = 0; // Initialize total price to zero
    $.ajax({
        url: 'fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Clear previous cart items
            $('#cartItemsContainer').empty();
            // Iterate through each item in the cart and generate HTML
            response.forEach(function(item) {
                console.log(item.productId);
                var html = '<div class="card-modal">';
                html += '<div class="card-modal-body">';
                html += '<div class="productimage">';
                html += '<img src="img/' + item.productImage + '" class="card-img" alt="' + item.productName + '" />';
                html += '</div>';
                html += '<h5 class="card-title">' + item.productName + '</h5>';
                html += '<p class="card-text"><strong>Price: </strong>$' + item.productPrice + '</p>';
                html += '<p class="card-text"><strong>Unit Quantity: </strong>' + item.unitQuantity + '</p>';
                html += '<p class="card-text"><strong>Quantity: </strong>' + item.quantity + '</p>';
                html += '<div class="input-group">';
                html += '<input type="number" id="quantityInput_' + item.productId + '" class="form-control" value="' + item.quantity + '">';
                html += '<div class="input-group-append">';
                html += '<button class="btn btn-primary" type="button" onclick="updateCartItemQuantity(' + item.productId + ', document.getElementById(\'quantityInput_' + item.productId + '\').value)">Update Quantity</button>';
                html += '</div>';
                html += '</div>';
                html += '<button type="button" class="btn btn-danger" onclick="removeFromCart(' + item.productId + ')">Remove Item</button>';
                html += '</div>';
                html += '</div>';

                $('#cartItemsContainer').append(html);
                totalPrice += parseFloat(item.productPrice) * parseInt(item.quantity);
            });
            // Set the total price in the totalPriceContainer
            $('#totalPriceContainer').text('Total Price: $' + totalPrice.toFixed(2));
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
        data: { productId: productId },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Reload the cart items after successful removal
                fetchCartItems();
                fetchCartEmpty()
            } else {
                console.error('Failed to remove item from cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Function to update the quantity of an item in the cart
function updateCartItemQuantity(productId, quantity) {
    $.ajax({
        url: 'update_cart_item_quantity.php',
        type: 'POST',
        data: { productId: productId, quantity: quantity },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Reload the cart items after successful update
                fetchCartItems();
                fetchCartEmpty()
            } else {
                console.error('Failed to update item quantity');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Function to clear the shopping cart
function clearCart() {
    $.ajax({
        url: 'clear_cart.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Reload the cart items after successful clearing
                fetchCartItems();
                fetchCartEmpty()
            } else {
                console.error('Failed to clear the shopping cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


// Call fetchCartItems initially to load cart items when the page loads
$(document).ready(function() {
    fetchCartItems();
});


    </script>
