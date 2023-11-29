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
    private function showCssLinks() {}
    private function showHeaderStart() {}
    private function showHeaderEnd() {}
    private function showMenu() {echo 'test';}
    protected function showContent() {echo "hallo";}
    private function showFooter() {echo 'gelukt';}

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