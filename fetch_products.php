<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'afiz', '1234', 'grocerystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

// Check if the category parameter is provided
if(isset($_GET['category'])) {
    // Set the provided category
    $category = $_GET['category'];

    // Prepare and execute the SQL query to fetch products based on the provided category
    $sql = "SELECT * FROM products WHERE category = '$category'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if(mysqli_num_rows($result) > 0) {
        // Loop through each fetched product and generate a card
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<div class="productimage">';
            echo '<img src="img/' . $row['img'] . '" class="card-img" alt="Product Image" />';
            echo '</div>';  
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
            echo '<p class="card-text"><strong>Unit Price: </strong>$' . $row['unit_price'] . '</p>';
            echo '<p class="card-text"><strong>Unit Quantity: </strong>' . $row['unit_quantity'] . '</p>';
            echo '<p class="card-text"><strong>In Stock: </strong>' . $row['in_stock'] . '</p>';
            echo '<div class="centreBtn">';
            echo '<button type="button" class="btn btn-primary" onclick="addToCart(\'' . $row['product_name'] . '\', \'' . $row['unit_price'] . '\', \'' . $row['img'] . '\', \'' . $row['unit_quantity'] . '\')">Add to Cart</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // If no products are found, display a message
        echo '<p>No products found for this category.</p>';
    }
} elseif(isset($_GET['keyword'])) {
    // Set the provided keyword
    $keyword = $_GET['keyword'];

    // Prepare and execute the SQL query to search for products based on the keyword
    $sql = "SELECT * FROM products WHERE CONCAT(product_name, ' ', unit_quantity) LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if(mysqli_num_rows($result) > 0) {
        // Loop through each fetched product and generate a card
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<div class="productimage">';
            echo '<img src="img/' . $row['img'] . '" class="card-img" alt="Product Image" />';
            echo '</div>';  
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
            echo '<p class="card-text"><strong>Unit Price: </strong>$' . $row['unit_price'] . '</p>';
            echo '<p class="card-text"><strong>Unit Quantity: </strong>' . $row['unit_quantity'] . '</p>';
            echo '<p class="card-text"><strong>In Stock: </strong>' . $row['in_stock'] . '</p>';
            echo '<div class="centreBtn">';
            echo '<button type="button"class="btn btn-primary " data-dismiss="modal">Add to Cart</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // If no products are found, display a message
        echo '<p>No products found matching your search.</p>';
    }
}

else {
    // If neither category nor keyword parameters are provided, display an error message
    echo 'Error: Category or keyword parameter is missing.';
}

// Close the database connection
mysqli_close($conn);
?>
