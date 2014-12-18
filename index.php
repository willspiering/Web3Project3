<?php

/*
View the Products
*/

//Array to define all products
$products[0] = array(
   'band' => 'Three Days Grace',
    'album' => 'One-X',
    'format' => 'CD',
    'description' => 'Good Tunes',
    'price' => 12.99
);

$products[1] = array(
   'band' => 'Three Days Grace',
    'album' => 'Three Days Grace',
    'format' => 'CD',
    'description' => 'Awesome Songs',
    'price' => 7.99
);

$products[2] = array(
   'band' => 'Breaking Benjamin',
    'album' => 'Greatest Hits',
    'format' => 'CD',
    'description' => 'All of their best songs and acoustic sets',
    'price' => 14.99
);

$products[3] = array(
   'band' => 'Linkin Park',
    'album' => 'Hybrid Theory',
    'format' => 'CD',
    'description' => 'Gets you pumped up and ready to kick some ass',
    'price' => 8.99
);

$products[4] = array(
   'band' => 'Linkin Park',
    'album' => 'Meteora',
    'format' => 'CD',
    'description' => 'Last Good album these guys made',
    'price' => 7.99
);

$products[5] = array(
   'band' => 'Celine Dion',
    'album' => 'Lets Talk About Love',
    'format' => 'CD',
    'description' => 'This has that song, "My Heart Will Go On" and its one of Coreys favorites',
    'price' => 12.99
);

//html
echo
"<h1>Music Store</h1>";
//Loop That will display all items
    foreach($products as $products){
    echo "<p>
    
    <span style='font-weight:bold;'>" . $products['band'] . "</span><br>" .
        $products['album'] . "<br>" .
        $products['format'] . "<br>" .
        "Description: " . $products['description'] . "<br>" .
        "Price: $" . $products['price'] . "<br></p>";
}

?>