<?php


abstract class Controller {


    protected $config;

    protected function  url($controller , $action , $params=null) {
        if (empty($params)){
            return $this->config['href']."index.php?c=$controller&a=$action";
        }else {
            return $this->config['href']."index.php?c=$controller&a=$action&p=$params";
        }
    }


} 