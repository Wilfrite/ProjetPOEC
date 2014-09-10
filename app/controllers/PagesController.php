<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 28/08/14
 * Time: 10:03
 */

class PagesController {

    protected $config;

    protected function  url($controller , $action , $params=null) {
        if (empty($params)){
            return $this->config['href']."index.php?c=$controller&a=$action";
        }else {
            return $this->config['href']."index.php?c=$controller&a=$action&p=$params";
        }
    }


    protected $articleService;
    //protected $categoriesModel;
    //protected $motCleModel;

    public function __construct(array $config,$dbh) {
        $this->config = $config;
        $this->articleService = new ArticleService($dbh);

    }

    function index()
    {
        $href = $this->config['href'];
        $title='Home - POECSTORE';
        $articles = $this->articleService->findAllArticles();
        //var_dump($articles);
        require ROOT .'/views/web/pages/home.php';
    }

    function error404(){
        //$title="PoecBlog - error404";
       // require ROOT.'/views/web/pages/error404.php';
    }
}