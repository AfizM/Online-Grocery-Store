<!doctype html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Online Grocery Store</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="index.css" />
   </head>
   <body>
      <header class="bg-dark text-white py-4">
         <div class="text-center">
            <h1>Online Grocery Store</h1>
         </div>
      </header>
      <!-- Categories -->
      <div class="catcontainer">
      <div class="categories">
         <h2>Categories</h2>
         <ul>
           
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
                     <li><a href="#" class="category-item">Bananas </a></li>
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
            <input type="text" class="form-control" id="searchInput" placeholder="Search Products" aria-label="Search Products" aria-describedby="button-addon2" />
            <div class="input-group-append">
               <button class="btn btn-outline-primary" type="button" id="searchButton"> Search </button>
            </div>
            <button type="button" class="btn btn-primary openshopbutton" data-toggle="modal" data-target="#shoppingListModal" id="openButton"> Open Shopping Cart </button>
         </div>
         <!-- Product cards -->
         <div class="cards">
         </div>
         <!-- Shopping list modal -->
         <div class="modal fade" id="shoppingListModal" tabindex="-1" aria-labelledby="shoppingListModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="shoppingListModalLabel"> Shopping Cart </h5>
                  </div>
                  <div class="modal-body">
                     <!-- Card items container -->
                     <div id="cartItemsContainer"></div>
                     <div class="btm-cart-buttons">
                        <button type="button" class="btn btn-danger cart-btn" onclick="clearCart()">Clear Cart</button>
                        <button type="button" class="btn btn-primary openshopbutton " id="submitOrder" data-toggle="modal">Submit</button>
                     </div>
                     <p id="totalPriceContainer"></p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="index.js"></script>