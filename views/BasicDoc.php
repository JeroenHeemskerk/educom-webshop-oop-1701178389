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
    private function showCssLinks() {echo' <link rel="stylesheet" href="CSS/stylesheet.css">';}
    private function showHeaderStart() {echo '<header><h1>';}
    protected function showHeader() {echo 'moet overriden worden';}
    private function showHeaderEnd() {echo '</h1></header>';}
    private function showMenu()
    {
        echo '<nav>' . PHP_EOL;                
        $this -> showNavList ();
        echo '</nav><br>' . PHP_EOL;
    }
    private function showNavList()
    {
        echo    '<ul class="menu">' . PHP_EOL;
        foreach ($this -> data['menu'] as $link => $label)
        {
            $this -> showNavItem($link, $label);
        }
        echo    '</ul>' . PHP_EOL;
    }
    private function showNavItem($link, $label) 
    {
        echo '<li><a class="navigateMenu" href="index_db.php?page=' . $link . '">' . $label . '</a></li>';
    } 


    protected function showContent() {echo 'dit moet overriden worden';}
    private function showFooter() {echo '<footer><p>&copy; 2023 Nicole Goris</p></footer>';}

    protected function showHeadContent() 
    {
        $this->showTitle();
        $this->showCSSLinks();
    }
 
    protected function showBodyContent() 
    {
        $this -> showHeaderStart();
        $this -> showHeader();
        $this -> showHeaderEnd();
        $this -> showMenu();
        $this -> showContent();
        $this -> showFooter();
     }
}

?>