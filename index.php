<?php
session_start();
/*
View the Products
*/

//Array to define all products
$products = array(
    1 => array(
       'band' => 'Three Days Grace',
        'album' => 'One-X',
        'format' => 'CD',
        'description' => 'Good Tunes',
        'price' => 12.99 
    ),
    2 => array(
        'band' => 'Three Days Grace',
        'album' => 'Three Days Grace',
        'format' => 'CD',
        'description' => 'Awesome Songs',
        'price' => 7.99 
    ),
    3 => array(
       'band' => 'Breaking Benjamin',
        'album' => 'Greatest Hits',
        'format' => 'CD',
        'description' => 'All of their best songs and acoustic sets',
        'price' => 14.99 
    ),
    4 => array(
       'band' => 'Linkin Park',
        'album' => 'Hybrid Theory',
        'format' => 'CD',
        'description' => 'Gets you pumped up and ready to kick some ass',
        'price' => 8.99 
    ),
    5 => array(
       'band' => 'Linkin Park',
        'album' => 'Meteora',
        'format' => 'CD',
        'description' => 'Last Good album these guys made',
        'price' => 7.99
    ),
    6 => array(
       'band' => 'Celine Dion',
        'album' => 'Lets Talk About Love',
        'format' => 'CD',
        'description' => 'This has that song, "My Heart Will Go On" and its one of Corey\'s favorites',
        'price' => 12.99
    )

);
// Initialize the cart
if(!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();   
}

// Empty the cart
if(isset($_GET['empty_cart'])) {
    $_SESSION['shopping_cart'] = array();
}
//Add item to cart
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    //let user know item is already in cart
    if(isset($_SESSION['shopping_cart'][$product_id])) {
        echo "Item Already in Cart!<br>";
    }
    else {
    $_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
    $_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
    }
}
// Update the Cart
if(isset($_POST['update_cart'])) {
    $quantities = $_POST['quantity'];
    foreach($quantities as $id => $quantity){
        $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
        echo "ID: $id - Quantity: $quantity<br>";
    }
}

//html
echo"<h1 style='text-align:center;'>Music Store</h1>";
echo "<h3 style='text-align:right;'><a href='./index.php?view_cart='>View Cart</a></h3>";
//view single item
if(isset($_GET['view_product'])) {
    //View individual item
    $product_id = $_GET['view_product'];
    echo "<span><a href='./index.php'>Music Store</a> > <a href='./index.php'>" . $products[$product_id]['band'] . "</a></span><br>
    
    <p>
        <span style='font-weight:bold;'>" . $products[$product_id]['album'] . "</span><br>
        <span>" . $products[$product_id]['band'] . "</span><br>
        <span>" . $products[$product_id]['format'] . "</span><br>
        <span>$" . $products[$product_id]['price'] . "</span><br>
        <span>" . $products[$product_id]['description'] . "</span><br>
        <p>
            <form action='./index.php?view_product=$product_id' method='post'>
                <select name='quantity'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                </select>
                <input type='hidden' name='product_id' value='$product_id' />
                <input type='submit' name='add_to_cart' value='Add to cart' />
            </form>
        </p>
    </p>";
}
//view the cart
else if(isset($_GET['view_cart'])) {
    echo "<p><a href='./index.php'>Music Store</a></p>";
    echo"<h2 style='text-align:center;'>Shopping Cart</h2><p>
        <a href='./index.php?empty_cart=1'>Empty Cart</a></p>";
    
    if(empty($_SESSION['shopping_cart'])) {
        echo "Your Cart is Empty.<br>";
    }
    else {
        //display items in cart
        echo "<form action='./index.php?view_cart=1' method='post'>
        <table style='width:500px;' cellspacing='0'>
        <tr style='border-bottom:1px solid #000000;'>
            <th style='border-bottom: 1px solid #000000;'>Album</th>
            <th style='border-bottom: 1px solid #000000;'>Artist</th>
            <th style='border-bottom: 1px solid #000000;'>Format</th>
            <th style='border-bottom: 1px solid #000000;'>Item Price</th>
            <th style='border-bottom: 1px solid #000000;'>Quantity</th>
            <th style='border-bottom: 1px solid #000000;'>Cost</th>
        </tr>";
        
        $total_price = 0;
        foreach($_SESSION['shopping_cart'] as $id => $product) {
            $product_id = $product['product_id'];
            //echo $product['quantity'] . 'x ' . $products[$product_id]['album'] . '  ' .  $products[$product_id]['band'] . "<br>";
            
         echo "<tr>
        <td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=$id'>" . $products[$product_id]['album'] . "</a></td>
        <td style='border-bottom: 1px solid #000000;'>" . $products[$product_id]['band'] . "</td>
        <td style='border-bottom: 1px solid #000000;'>" . $products[$product_id]['format'] . "</td>
        <td style='border-bottom: 1px solid #000000;'>$" . $products[$product_id]['price'] . "</td>
        <td style='border-bottom: 1px solid #000000;'>
            <input type='text' name='quantity[$product_id]' value='" . $product['quantity'] . "' /></td>
        <td style='border-bottom: 1px solid #000000;'>$" . ($products[$product_id]['price'] * $product['quantity']) . "</td>
        </tr>";
        }
    echo "</table>
    <input type='submit' name='update_cart' value='Update' />
    </form>";
    }
    
}
else {
    echo "<p><a href='./index.php'>Music Store</a></p>";
    echo "<table style='width:500px;' cellspacing='0'>";
    echo "<tr style='border-bottom:1px solid #000000;'>
            <th style='border-bottom: 1px solid #000000;'>Album</th>
            <th style='border-bottom: 1px solid #000000;'>Artist</th>
            <th style='border-bottom: 1px solid #000000;'>Format</th>
            <th style='border-bottom: 1px solid #000000;'>Price</th>
        </tr>";
        
//Loop That will display all items
    foreach($products as $id => $products){
    echo "<tr>
        <td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=$id'>" . $products['album'] . "</a></td>
        <td style='border-bottom: 1px solid #000000;'>" . $products['band'] . "</td>
        <td style='border-bottom: 1px solid #000000;'>" . $products['format'] . "</td>
        <td style='border-bottom: 1px solid #000000;'>$" . $products['price'] . "</td>
        </tr>";
}
echo "</table>";
}
?>