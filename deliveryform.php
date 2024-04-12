<!-- delivery_details.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional CSS for centering the card */
        container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        header {
            margin-bottom: 50px;
        }
    </style>
</head>
<header class="bg-dark text-white py-4">
    <div class="text-center">
        <h1>Online Grocery Store</h1>
    </div>
</header>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delivery Details</h5>
                        <form id="deliveryForm" action="confirmation.php" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="recipientName">Recipient's Name:</label>
                                <input type="text" class="form-control" id="recipientName" name="recipientName" required>
                            </div>
                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="form-group">
                                <label for="citySuburb">City/Suburb:</label>
                                <input type="text" class="form-control" id="citySuburb" name="citySuburb" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State/Territory:</label>
                                <select class="form-control" id="state" name="state" required>
                                    <option value="">Select State/Territory</option>
                                    <option value="NSW">New South Wales (NSW)</option>
                                    <option value="VIC">Victoria (VIC)</option>
                                    <option value="QLD">Queensland (QLD)</option>
                                    <option value="WA">Western Australia (WA)</option>
                                    <option value="SA">South Australia (SA)</option>
                                    <option value="TAS">Tasmania (TAS)</option>
                                    <option value="ACT">Australian Capital Territory (ACT)</option>
                                    <option value="NT">Northern Territory (NT)</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mobileNumber">Mobile Number:</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>
                                <small class="form-text text-muted">Format: 10-digit number</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <input type="hidden" id="productNamesInput" name="productNames">
<input type="hidden" id="productQuantitiesInput" name="productQuantities">
<input type="hidden" id="totalPriceInput" name="totalPrice">
                            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <script>
        function validateForm() {
            // Get form inputs
            var recipientName = document.getElementById('recipientName').value.trim();
            var street = document.getElementById('street').value.trim();
            var citySuburb = document.getElementById('citySuburb').value.trim();
            var state = document.getElementById('state').value;
            var mobileNumber = document.getElementById('mobileNumber').value.trim();
            var email = document.getElementById('email').value.trim();

            // Validate email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            // Additional validation for mobile number (10-digit)
            var mobileRegex = /^[0-9]{10}$/;
            if (!mobileRegex.test(mobileNumber)) {
                alert('Please enter a 10-digit mobile number.');
                return false;
            }

            // You can add more specific validation rules as needed

            // If all validations pass, return true to submit the form
            return true;
        }

        let allItemsAvailable = true;
        let productNames = [];
    let productQuantities = [];
    let totalPrice = 0; // Initialize total price to zero

        // Disable submit button initially
        document.getElementById('submitButton').disabled = true;

        // Enable/disable submit button based on form validity
        document.getElementById('deliveryForm').addEventListener('change', function() {
            var isFormValid = document.getElementById('deliveryForm').checkValidity();
            document.getElementById('submitButton').disabled = !isFormValid;
        });

        // Function to check availability of items in the shopping cart
        function checkAvailability(productId, quantity) {
    // Perform an AJAX request to check the availability of the item
    $.ajax({
        url: "check_availability.php",
        type: "POST",
        data: { productId: productId, quantity: quantity },
        dataType: 'json',
        async: false,
        success: function(response) {
            // Parse the response to determine availability
            available = response.available; // Access the 'available' property of the response
            if (!available) {
                // If item is not available, display a message and handle accordingly
                alert(`Sorry, ${productId} is currently out of stock.`);
                // You may want to disable the order button or take other actions here
                allItemsAvailable = false;
            } else {
                // If item is available, you may want to enable the order button or proceed with the order
                console.log(`${productId} is available.`);
                // You may want to enable the order button or take other actions here
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            // Handle error scenario appropriately
        }
    });
}




function fetchCartItems() {
    $.ajax({
        url: 'fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function(response) {

            // Iterate through each item in the cart and generate HTML
            response.forEach(function(item) {
                checkAvailability(item.productId,item.quantity);
                if (!productNames.includes(item.productId)) {
                    productNames.push(item.productName);
                    productQuantities.push(item.quantity);
                    totalPrice += parseFloat(item.productPrice) * parseInt(item.quantity);
                }
            });

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function updateQuantity(productId, quantity) {
    // Perform an AJAX request to check the availability of the item
    $.ajax({
        url: "update_quantity.php",
        type: "POST",
        data: { productId: productId, quantity: quantity },
        dataType: 'json',
        async: false,
        success: function(response) {
            console.log("success");
            alert("success");   

        },
        error: function(xhr, status, error) {
            console.error(error);
            // Handle error scenario appropriately
        }
    });
}

function fetchCartItemsToUpdate() {
    $.ajax({
        url: 'fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function(response) {

            // Iterate through each item in the cart and generate HTML
            response.forEach(function(item) {
                console.log("updating");
                updateQuantity(item.productId,item.quantity);
            });

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
            if (response.success) {

            } else {
                console.error('Failed to clear the shopping cart');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Function to handle form submission
function submitForm() {
        // If all items are available, submit the form
        fetchCartItems();
        if (allItemsAvailable) {
            document.getElementById("productNamesInput").value = productNames.join(", ");
        document.getElementById("productQuantitiesInput").value = productQuantities.join(", ");
        document.getElementById("totalPriceInput").value = totalPrice.toFixed(2);
        fetchCartItemsToUpdate();
        clearCart();



            document.getElementById("deliveryForm").submit();
        } else {
            // If any item is not available, prevent form submission
            alert('Some items in your cart are out of stock. Please remove them or adjust the quantity.');
             window.location.href = "index.php?showCartModal=true";
            return false;
        }
    }

// Attach submitForm function to form submission event
document.getElementById("deliveryForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    submitForm(); // Call submitForm function to handle form submission
});

// $(document).ready(function() {
//     fetchCartItemsToUpdate()
// });


    </script>
</body>
</html>
