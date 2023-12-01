<?php
require_once "../views/BasicDoc.php";

class ItemDoc extends BasicDoc {
    private function getItemFromDb() {}
    protected function showItem($page, $row) 
    {       
        $counter = 0;
        $topNumber = 1;
        foreach ($item as $row) {
            $commaPrice = number_format($row['price'], 2, ',', '.');
            $itemClass = ($counter % 2 == 0) ? 'evenItem' : 'oddItem';
            echo    '<a class="item" href="index.php?page=details&id=' . $row['id'] . '"><div class="' . $itemClass . '">' . PHP_EOL;
            switch($page)
            {
                case "shop": 
                    echo '' . $row['id'] . '<br>' . PHP_EOL;
                    echo '<img src="Images/' . $row['filename'] . '" width="100" height="100" alt="Afbeelding"><br>' . PHP_EOL; 
                    break;
                case "top5":
                    echo '<h2>' . $topNumber . '</h2><br>' . PHP_EOL;
                    echo '<img src="Images/' . $row['filename'] . '" width="100" height="100" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
                case "details":
                    echo '<img src="Images/' . $row['filename'] . '" width="300" height="300" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
            }
            echo    '<h3>' . $row['name'] . '</h3><br>' . PHP_EOL;
            switch($page)
            {
                case "details":
                    $row['description'];
                    break;
                default:
                    break;
            }
            echo    ' € ' . $commaPrice . 
                    '<br><br>' . PHP_EOL; 
            $counter++;
            $topNumber++;
        }
    }
    protected function showCartButton($page, $row) 
    {
        require_once('session_manager.php'); 
        if (!empty(isUserLoggedIn())) {
            echo '  <form action="index.php" method="post">
                        <input type="hidden" name="page" value="' . $page . '">
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
