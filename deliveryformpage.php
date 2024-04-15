<!-- delivery_details.html -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Delivery Details</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <style>
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
                           <input type="email" class="form-control" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
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
      <script src="deliveryformpage.js"></script>
   </body>
</html>