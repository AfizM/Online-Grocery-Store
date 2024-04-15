<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Confirmation</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <style>
         .container {
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
            <div class="card">
               <div class="card-body">
                  <h5 class="card-title">Order Details</h5>
                  <p>Name: <?php echo $_POST['recipientName']; ?></p>
                  <p>Email: <?php echo $_POST['email']; ?></p>
                  <p>Product Names: <?php echo $_POST['productNames']; ?></p>
                  <p>Product Quantities: <?php echo $_POST['productQuantities']; ?></p>
                  <p>Total Price: $<?php echo $_POST['totalPrice']; ?></p>
                  <button id="backBtn">Back to main page</button>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
       $("#backBtn").click(function() {
        window.location.href = "index.php";
    });
</script>