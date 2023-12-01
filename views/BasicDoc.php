<?php
require_once "HtmlDoc.php";

class BasicDoc extends HtmlDoc 
{
    protected $data;
    public function __construct($myData) 
    {
        $this->data = $myData;
    }
    private function showTitle() {echo '<title>' . $this->data['page'] . '</title>';}
    private function showCssLinks() {echo' <link rel="stylesheet" href="../CSS/stylesheet.css">';}
    private function showHeader() {echo '<header><h1>Hier moet de page komen vanuit data</h1></header>';}
    private function showMenu() {echo 'Ik weet nog niet hoe het menu moet.<br>';}
    /*{
        echo '<nav>' . PHP_EOL;                
        showNavList ();
        echo '</nav>' . PHP_EOL;
    }
    
    private function showNavList()
    {
        echo    '<ul class="menu">' . PHP_EOL;
        foreach ($data['menu'] as $link => $label)
        {
            showNavItem($link, $label);
        }
        echo    '</ul>' . PHP_EOL;
    }*/
    //protected function showContent();
    private function showFooter() {echo '<footer><p>&copy; 2023 Nicole Goris</p></footer>';}

    protected function showHeadContent() 
    {
        $this->showTitle();
        $this->showCSSLinks();
    }
 
    protected function showBodyContent() 
    {
        $this -> showHeader();
        $this -> showMenu();
        $this -> showContent();
        $this -> showFooter();
     }
}

?>