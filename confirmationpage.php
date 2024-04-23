<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Delivery Details</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            header {
                margin-bottom: 50px;
            }
            .container {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .card-body {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .card {
                width: 50%;
                height: 50%;
            }
            .card.text {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <header class="bg-primary text-white py-3">
            <div class="container">
                <img src="img/logo1.png" alt="Logo" class="img-fluid" style="height: 80px; display: block; margin: 0 auto;" />
            </div>
        </header>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Order Confirmation</h3>
                    <p class="card-text">Thank you for purchasing from Online Grocery Store! The following are your order details:</p>
                    <p class="card-text">
                        <strong>Name:</strong>
                        <?php echo $_POST['recipientName']; ?>
                    </p>
                    <p class="card-text">
                        <strong>Email:</strong>
                        <?php echo $_POST['email']; ?>
                    </p>
                    <p class="card-text">
                        <strong>Product Names:</strong>
                        <?php echo $_POST['productNames']; ?>
                    </p>
                    <p class="card-text">
                        <strong>Product Quantities:</strong>
                        <?php echo $_POST['productQuantities']; ?>
                    </p>
                    <p class="card-text"><strong>Total Price:</strong> $<?php echo $_POST['totalPrice']; ?></p>
                    <button id="backBtn" class="btn btn-primary">Back to main page</button>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $("#backBtn").click(function () {
                window.location.href = "index.php";
            });
        </script>
    </body>
</html>
