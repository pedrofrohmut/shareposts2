<?php
class Service
{
    protected $params;

    protected function __construct(array $params)
    {
        $this->params = $params;
    }
}