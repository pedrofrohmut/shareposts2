<?php
class StringHandler
{
    public function __construct()
    {
        $this->init();
    }

    private function init() {}

    public static function limitTheDisplayText($text, $limit = 20)
    {
        if (strlen($text) > $limit) {
            return substr($text, 0, $limit) . '...';
        } else {
            return $text;
        }
    }
}