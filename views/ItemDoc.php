<?php
require_once "BasicDoc.php";

abstract class ItemDoc extends BasicDoc {
    private function getItemFromDb() {echo 'database blijven we nog even af'; }
    protected function showItem($page, $items) 
    {       
        $counter = 0;
        $topNumber = 1;
        foreach ($items as $row) {
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
                    echo '<h2>' . $topNumber . '</h2>' . PHP_EOL;
                    echo '<img src="Images/' . $row['filename'] . '" width="100" height="100" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
                case "details":
                    echo '<img src="Images/' . $row['filename'] . '" width="300" height="300" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
            }
            echo    '<h3>' . $row['name'] . '</h3>' . PHP_EOL;
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
            //require_once('session_manager.php'); 
            //if (!empty(isUserLoggedIn())) {
                echo '  <form action="index.php" method="post">
                <input type="hidden" name="page" value="' . $page . '">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <input type="hidden" name="action" value="storeItemInSession">
                <input class="cartButton "type="submit" value="Voeg toe aan winkelwagentje"><br>
                </form>';
                //}
                echo    '</div></a>';
            }
    }
}

?> 
<?php
