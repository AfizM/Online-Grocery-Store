
let allItemsAvailable = true;
let productNames = [];
let productQuantities = [];
let totalPrice = 0; 

document.getElementById("deliveryForm").addEventListener("submit", function(event) {
	event.preventDefault(); 
	let isFormValid = document.getElementById('deliveryForm').checkValidity();
    if(isFormValid) {
        submitForm();
    } else {
       prompt("form not valid")
    }
});

$("#backButton").click(function() {
	window.location.href = "index.php?showCartModal=true";
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
				console.log(`${productId} is currently out of stock.`);
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
		document.getElementById('submitButton').disabled = true;
		document.getElementById('errorMessage').style.display = 'block'; 
		document.getElementById('backButton').style.display = 'inline'; 
		// window.location.href = "index.php?showCartModal=true";
		return false;
	}
}


