<?php

class HtmlDoc {
    private function showHtmlStart() {echo '<!doctype html><html>';}
    private function showHeadStart() {echo' <head>';}
    protected function showHeadContent() {}
    private function showHeadEnd() {echo' </head>';}
    private function showBodyStart() {echo' <body><div class="center">';}
    protected function showBodyContent() {}
    private function showBodyEnd() {echo' </div></body>';}
    private function showHtmlEnd() {echo '</html>';}
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