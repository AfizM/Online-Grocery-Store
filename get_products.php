<?php

$conn = mysqli_connect('localhost', 'afiz', '1234', 'grocerystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

if(isset($_GET['category'])) {

    $category = $_GET['category'];

    $sql = "SELECT * FROM products WHERE category = '$category'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
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
            if ($row['in_stock'] > 0) {
                // If the product is in stock, make the button clickable
                echo '<button type="button" class="btn btn-primary" onclick="addToCart(\'' . $row['product_id'] . '\',\'' . $row['product_name'] . '\', \'' . $row['unit_price'] . '\', \'' . $row['img'] . '\', \'' . $row['unit_quantity'] . '\')">Add to Cart</button>';
            } else {
                echo '<button type="button" class="btn btn-primary" disabled>Out of Stock</button>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found for this category.</p>';
    }
}
 elseif(isset($_GET['keyword'])) {

    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM products WHERE CONCAT(product_name, ' ', unit_quantity) LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
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
            if ($row['in_stock'] > 0) {
                echo '<button type="button" class="btn btn-primary" onclick="addToCart(\'' . $row['product_id'] . '\',\'' . $row['product_name'] . '\', \'' . $row['unit_price'] . '\', \'' . $row['img'] . '\', \'' . $row['unit_quantity'] . '\')">Add to Cart</button>';
            } else {
                echo '<button type="button" class="btn btn-primary" disabled>Out of Stock</button>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found matching your search.</p>';
    }
}
else {
    echo 'Error: Category or keyword parameter is missing.';
}

mysqli_close($conn);
?>
