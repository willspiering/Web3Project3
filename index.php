<?php

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



//html
echo
"<h1>Music Store</h1>";

if(isset($_GET['view_product'])) {
    //View individual item
    $product_id = $_GET['view_product'];
    echo "<span><a href='./index.php'>Music Store</a> > <a href='./index.php'>" . $products[$product_id]['band'] . "</a></span><br>
    
    <p>
        <span style='font-weight:bold;'>" . $products[$product_id]['album'] . "</span><br>
        <span>" . $products[$product_id]['band'] . "</span><br>
        <span>" . $products[$product_id]['format'] . "</span><br>
        <span>$" . $products[$product_id]['price'] . "</span><br>
        <span>" . $products[$product_id]['description'] . "</span>
    </p>";
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