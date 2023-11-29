<?php

class HtmlDoc {
    private function showHtmlStart() {}
    private function showHeadStart() {}
    protected function showHeadContent() {}
    private function showHeadEnd() {}
    private function showBodyStart() {}
    protected function showBodyContent() {}
    private function showBodyEnd() {}
    private function showHtmlEnd() {}
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