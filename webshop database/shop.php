<?php

function showShopHeader ()
{
    echo '<h1>Spellenwinkel</h1>';
}

function showShopContent()
{
    $item = '';
    require_once('file_repository.php');
    $item = getShopItems($item);
    $counter = 0;
    foreach ($item as $row) {
        $commaPrice = number_format($row['price'], 2, ',', '.');
        $shopItemClass = ($counter % 2 == 0) ? 'evenItem' : 'oddItem';
        echo    '<a class="shopItem" href="index.php?page=details&id=' . $row['id'] . '"><div class="' .$shopItemClass . '">' . 
                $row['id'] . '<br>' .
                '<img src="Images/' . $row['filename'] . '" width="100" height="100" alt="Afbeelding"> 
                <h3>' . $row['name'] . '</h3>
                € ' . $commaPrice . 
                '<br><br>';  
        if ($this -> allowedToBuy) {
            echo '  <form action="index.php" method="post">
                        <input type="hidden" name="page" value="shop">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="hidden" name="action" value="storeItemInSession">
                        <input class="cartButton "type="submit" value="Voeg toe aan winkelwagentje">
                    </form>';
        }
        echo    '</div></a>';
                $counter++;
    }
}



?>
  