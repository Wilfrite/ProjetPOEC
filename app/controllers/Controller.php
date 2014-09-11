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
    /**
     * @param string $type
     * @param $message
     */
    protected  function setFlash($message, $type='warning') {
        $_SESSION['flash']['message'] = $message;
        $_SESSION['flash']['type'] = $type;
    }
    protected function flash() {
        if (isset($_SESSION['flash']))
        {
            $flash =  $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }
    protected function addToCart($id_article, $quantite_article)
    {
        if (isset($_SESSION['panier'][$id_article]))
        {
            $_SESSION['panier'][$id_article] += $quantite_article;
        }
        else
        {
            $_SESSION['panier'][$id_article] = $quantite_article;
        }
    }

} 