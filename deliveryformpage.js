
function validateForm() {
	var recipientName = document.getElementById('recipientName').value.trim();
	var street = document.getElementById('street').value.trim();
	var citySuburb = document.getElementById('citySuburb').value.trim();
	var state = document.getElementById('state').value;
	var mobileNumber = document.getElementById('mobileNumber').value.trim();
	var email = document.getElementById('email').value.trim();
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	if(!emailRegex.test(email)) {

		return false;
	}
	var mobileRegex = /^[0-9]{10}$/;
	if(!mobileRegex.test(mobileNumber)) {

		return false;
	}

	return true;
}

let allItemsAvailable = true;
let productNames = [];
let productQuantities = [];
let totalPrice = 0; 

// document.getElementById('submitButton').disabled = true;

// document.getElementById('deliveryForm').addEventListener('change', function() {
// 	var isFormValid = document.getElementById('deliveryForm').checkValidity();
// 	document.getElementById('submitButton').disabled = !isFormValid;
// });

document.getElementById("deliveryForm").addEventListener("submit", function(event) {

  

});

$("#submitButton").click(function() {
    if(validateForm()){
        submitForm(); 
    }
    else{
        alert('Please enter the domain name e.g .com');
    }
});



function getCartItems() {
	$.ajax({
		url: 'get_cart_items.php',
		type: 'GET',
		dataType: 'json',
		async: false,
		success: function(response) {
			response.forEach(function(item) {
				checkAvailability(item.productId, item.quantity);
				if(!productNames.includes(item.productId)) {
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

function getCartItemsToUpdate() {
	$.ajax({
		url: 'get_cart_items.php',
		type: 'GET',
		dataType: 'json',
		async: false,
		success: function(response) {
			response.forEach(function(item) {
				console.log("updating");
				updateQuantity(item.productId, item.quantity);
			});
		},
		error: function(xhr, status, error) {
			console.error(error);
		}
	});
}

function checkAvailability(productId, quantity) {
	$.ajax({
		url: "check_availability.php",
		type: "POST",
		data: {
			productId: productId,
			quantity: quantity
		},
		dataType: 'json',
		async: false,
		success: function(response) {
			available = response.available; 
			if(!available) {
				alert(`${productId} is currently out of stock.`);
				allItemsAvailable = false;
			} else {
				console.log(`${productId} is available.`);
			}
		},
		error: function(xhr, status, error) {
			console.error(error);
		}
	});
}

function updateQuantity(productId, quantity) {
	$.ajax({
		url: "update_quantity.php",
		type: "POST",
		data: {
			productId: productId,
			quantity: quantity
		},
		dataType: 'json',
		async: false,
		success: function(response) {
			console.log("success");
			alert("success");
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
                console.log("Cart cleared");
            } else {
				console.log("Failed");
			}
		},
		error: function(xhr, status, error) {
			console.error(error);
		}
	});
}

function submitForm() {
	getCartItems();
	if(allItemsAvailable) {
		document.getElementById("productNamesInput").value = productNames.join(", ");
		document.getElementById("productQuantitiesInput").value = productQuantities.join(", ");
		document.getElementById("totalPriceInput").value = totalPrice.toFixed(2);
		getCartItemsToUpdate();
		clearCart();
		document.getElementById("deliveryForm").submit();
	} else {
		alert('Some items in your cart are out of stock. Please remove them or adjust the quantity.');
		window.location.href = "index.php?showCartModal=true";
		return false;
	}
}


// $(document).ready(function() {
//     fetchCartItemsToUpdate()
// });