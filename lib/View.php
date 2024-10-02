<?php

namespace Pages;
require 'views/record-notfound.php';

class View {

    private $data = [];

    public function __construct()
    {
    }

    public function render(string $page,array $data = [])
    {
        $this->data = array_merge($this->data, $data);
        require_once "views/{$page}";
    }

    public function with(array $data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

}