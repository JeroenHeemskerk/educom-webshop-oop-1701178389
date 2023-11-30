<?php

class HtmlDoc {
    private function showHtmlStart() {echo '<!doctype html>' . PHP_EOL . '<html>' . PHP_EOL;}
    private function showHeadStart() {echo' <head>' . PHP_EOL;}
    protected function showHeadContent() {}
    private function showHeadEnd() {echo' </head>' . PHP_EOL;}
    private function showBodyStart() {echo' <body><div class="center">' . PHP_EOL;}
    protected function showBodyContent() {}
    private function showBodyEnd() {echo' </div></body>' . PHP_EOL;}
    private function showHtmlEnd() {echo '</html>' . PHP_EOL;}
    public function show() {
        $this->showHtmlStart();
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
        $this->showBodyStart();
        $this->showBodyContent();
        $this->showBodyEnd();
        $this->showHtmlEnd();
    }
}

?>