<!-- delivery_details.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Details</title>
    <!-- Include any CSS files if needed -->
</head>
<body>
    <h1>Delivery Details</h1>
    <form id="deliveryForm" action="process_delivery_details.php" method="post" onsubmit="return validateForm()">
        <div>
            <label for="recipientName">Recipient's Name:</label>
            <input type="text" id="recipientName" name="recipientName" required>
        </div>
        <div>
            <label for="street">Street:</label>
            <input type="text" id="street" name="street" required>
        </div>
        <div>
            <label for="citySuburb">City/Suburb:</label>
            <input type="text" id="citySuburb" name="citySuburb" required>
        </div>
        <div>
            <label for="state">State/Territory:</label>
            <select id="state" name="state" required>
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
        <div>
            <label for="mobileNumber">Mobile Number:</label>
            <input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>
            <small>Format: 10-digit number</small>
        </div>
        <div>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" id="submitButton">Submit</button>
    </form>

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

        // Disable submit button initially
        document.getElementById('submitButton').disabled = true;

        // Enable/disable submit button based on form validity
        document.getElementById('deliveryForm').addEventListener('change', function() {
            var isFormValid = document.getElementById('deliveryForm').checkValidity();
            document.getElementById('submitButton').disabled = !isFormValid;
        });

        // Function to check availability of items in the shopping cart
function checkAvailability() {
    // Loop through each item in the shopping cart
    for (let i = 0; i < shoppingCart.length; i++) {
        const item = shoppingCart[i];
        // Perform an AJAX request to check the availability of the item
        $.ajax({
            url: "check_availability.php", // Provide the URL of the server-side script to check availability
            type: "POST",
            data: { productId: item.productId }, // Send the product ID or any other identifier to the server-side script
            async: false, // Ensure synchronous execution to wait for the response
            success: function(response) {
                // Parse the response to determine availability
                const available = response === "true";
                if (!available) {
                    // If item is not available, display a message and return false to indicate order cannot be placed
                    alert(`Sorry, ${item.name} is currently out of stock.`);
                    return false;
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Handle error scenario appropriately
            }
        });
    }
    // If all items are available, return true to indicate order can be placed
    return true;
}

// Function to handle form submission
function submitForm() {
    // Validate the form inputs
    if (!validateForm()) {
        return false; // Return false if form validation fails
    }
    // Check availability of items in the shopping cart
    if (!checkAvailability()) {
        return false; // Return false if any item is not available
    }
    // If form inputs are valid and all items are available, submit the form
    document.getElementById("deliveryForm").submit();
    return true;
}

// Attach submitForm function to form submission event
document.getElementById("deliveryForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    submitForm(); // Call submitForm function to handle form submission
});

    </script>
</body>
</html>
