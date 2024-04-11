



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
                        <p id="totalPriceContainer"></p>
                        <button type="button" id="clearCartButton" class="btn btn-danger">Clear Cart</button>
                        <button type="button" class="btn btn-primary openshopbutton" id="proceedToDeliveryButton" data-toggle="modal" data-target="#deliveryDetailsModal">
    Proceed to Delivery Details
</button>


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


    // Initialize empty cart array
let shoppingCart = [];

// Function to add item to cart
function addToCart(name, price, image, unit_quantity) {
    // Check if the item is already in the cart
    const existingItemIndex = shoppingCart.findIndex(item => item.name === name);
    if (existingItemIndex !== -1) {
        // If the item is already in the cart, increment its quantity by one
        shoppingCart[existingItemIndex].quantity++;
    } else {
        // Otherwise, add the item to the cart
        const item = {
            name: name,
            price: price,
            image: image,
            unit_quantity: unit_quantity,
            quantity: 1
        };
        shoppingCart.push(item);
    }
    updateCartModal();

}


// Function to increment the quantity of an item in the cart
function incrementQuantity(index) {
    shoppingCart[index].quantity++;
    updateCartModal();
}

// Function to decrement the quantity of an item in the cart
function decrementQuantity(index) {
    if (shoppingCart[index].quantity > 1) {
        shoppingCart[index].quantity--;
        updateCartModal();
    }
}

// Function to remove an item from the cart
function removeFromCart(index) {
    shoppingCart.splice(index, 1);
    updateCartModal();
}

// Function to update the quantity of an item in the cart
function updateQuantity(index, newQuantity) {
    if (newQuantity > 0) {
        shoppingCart[index].quantity = newQuantity;
        updateCartModal();
    }
}

// Function to calculate the total price of the shopping cart
function calculateTotalPrice() {
    let totalPrice = 0;
    shoppingCart.forEach(item => {
        totalPrice += item.price * item.quantity;
    });
    return totalPrice;
}

function clearShoppingCart() {
    shoppingCart = [];
    updateCartModal();
}

// Function to update the shopping cart modal content
function updateCartModal() {
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const totalPriceContainer = document.getElementById('totalPriceContainer');
    const proceedToDeliveryButton = document.getElementById('proceedToDeliveryButton'); // Get the button element

    cartItemsContainer.innerHTML = ''; // Clear previous content

    // Generate HTML markup for each item in the cart
    shoppingCart.forEach(item => {
        const itemHTML = `
            <div class="card-modal">
                <div class="card-modal-body">
                    <div class="productimage">
                        <img src="img/${item.image}" class="card-img" alt="${item.name}" />
                    </div>
                    <h5 class="card-title">${item.name}</h5>
                    <p class="card-text"><strong>Price: </strong>$${item.price}</p>
                    <p class="card-text"><strong>Unit Quantity: </strong>${item.unit_quantity}</p>
                    <p class="card-text"><strong>Quantity: </strong>${item.quantity}</p>
                </div>
            </div>
        `;
        cartItemsContainer.innerHTML += itemHTML;
    });

    // Calculate total price
    const totalPrice = calculateTotalPrice();
    totalPriceContainer.innerText = `Total Price: $${totalPrice.toFixed(2)}`;

    // Enable/disable proceed to delivery button based on cart emptiness
    if (shoppingCart.length > 0) {
        proceedToDeliveryButton.removeAttribute('disabled'); // Enable the button
    } else {
        proceedToDeliveryButton.setAttribute('disabled', 'disabled'); // Disable the button
    }
}




document.getElementById('clearCartButton').addEventListener('click', clearShoppingCart);




    </script>
