<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Grocery Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
		font-size: 26px; 
    }
    .catcontainer {
        display: flex;
        padding: 20px;
        height: 100vh; 
		max-width
    }
    
    .category {
        margin-bottom: 10px;
    }
    .sub-categories {
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
        margin-left: 20px;
    }
    .sub-categories.open {
        display: block;
    }

	.categories {
        list-style: none;
        margin: 0;
		padding: 20px;
        margin-right: 20px;
		flex-grow: 1;
        background-color: #f4f4f4;
        border-radius: 5px;
        height: 100%; 
    }
    .main-content {
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 5px;
		flex-grow: 3;
        height: 100%;
		
    }
    .shoppinglist {
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 5px;
		flex-grow: 1;
        margin-left: 10px;
        height: 100%; 
    }
	.input-group{
		width:75%;
	}

	
	.openshopbutton{
		margin-left: 50px;
	}

	.card{
	
		width: 40%;

	}
	.cards{
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
	}
</style>
</head>
<body>

<!-- Header -->
<header class="bg-dark text-white py-4">
    <div class=" text-center">
        <h1>Online Grocery Store</h1>
    </div>
</header>

<div class="catcontainer">
    <div class="categories">
        <h2>Categories</h2>
        <ul>
            <li>
                <div class="category">
                    <a href="#">Frozen</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#">Frozen Subcategory 1</a></li>
                        <li><a href="#">Frozen Subcategory 2</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="category">
                    <a href="#">Fresh</a>
                    <button class="btn btn-primary btn-sm ml-2" onclick="toggleSubcategories(this)">></button>
                    <ul class="sub-categories">
                        <li><a href="#">Fresh Subcategory 1</a></li>
                        <li><a href="#">Fresh Subcategory 2</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- Main content area -->
    <div class="main-content">
        <h2>Search for product: </h2>
		<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search Products" aria-label="Search Products" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
  </div>
  
  <button type="button" class="btn btn-primary openshopbutton" data-toggle="modal" data-target="#shoppingListModal">Open Shopping Cart</button>
</div>
<div class="cards">
<div class="card">
        <div class="productimage">
            <img src="product-image.jpg" class="card-img" alt="Product Image">
        </div>
            <div class="card-body">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text">Unit Price: $10</p>
                <p class="card-text">In Stock</p> 
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
</div>

<div class="card">
        <div class="productimage">
            <img src="product-image.jpg" class="card-img" alt="Product Image">
        </div>
            <div class="card-body">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text">Unit Price: $10</p>
                <p class="card-text">In Stock</p> 
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
</div>
<div class="card">
        <div class="productimage">
            <img src="product-image.jpg" class="card-img" alt="Product Image">
        </div>
            <div class="card-body">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text">Unit Price: $10</p>
                <p class="card-text">In Stock</p> 
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
</div>
<div class="card">
        <div class="productimage">
            <img src="product-image.jpg" class="card-img" alt="Product Image">
        </div>
            <div class="card-body">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text">Unit Price: $10</p>
                <p class="card-text">In Stock</p> 
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
</div>
<div class="card">
        <div class="productimage">
            <img src="product-image.jpg" class="card-img" alt="Product Image">
        </div>
            <div class="card-body">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text">Unit Price: $10</p>
                <p class="card-text">In Stock</p> 
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
</div>
</div>



	<!-- Shopping list modal -->
    <div class="modal fade" id="shoppingListModal" tabindex="-1" aria-labelledby="shoppingListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shoppingListModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Template card for products -->
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="product-image.jpg" class="card-img" alt="Product Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Product Name</h5>
                                    <p class="card-text">Unit Price: $10</p>
                                    <p class="card-text">Quantity: <input type="number" value="1" min="1"></p>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                    <button type="button" class="btn btn-primary">Update Quantity</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="shoppinglist">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shoppingListModal">Open Shopping Cart</button>
    </div>
</div> -->
</div>


<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleSubcategories(button) {
        const subCategories = button.nextElementSibling;
        subCategories.classList.toggle('open');
    }
</script>

</body>
</html>
