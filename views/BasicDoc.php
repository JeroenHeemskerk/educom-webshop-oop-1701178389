<?php
require_once "HtmlDoc.php";

$view = new HtmlDoc();
$view->show();

class BasicDoc extends HtmlDoc {
    protected $data;
    public function __construct($myData) {
        $this->data = $myData;
      }
    private function showTitle() {echo '<title>'.$this->data['page'].'</title>';}
    private function showCssLinks() {echo' <link rel="stylesheet" href="CSS/stylesheet.css">';}
    private function showHeaderStart() {echo '<header>';}
    private function showHeaderEnd() {echo '</header>';}
    private function showMenu() {echo 'Ik weet nog niet hoe deze moet';}
    protected function showContent() {echo "Dit moet overriden worden";}
    private function showFooter() {echo '<footer><p>&copy; 2023 Nicole Goris</p></footer>';}

    protected function showHeadContent() {
        $this->showTitle();
        $this->showCSSLinks();
    }
 
    protected function showBodyContent() {
        //$this -> showHeader();
        $this -> showMenu();
        $this -> showContent();
        $this -> showFooter();
     }
}

?>