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
    protected $categoriesService;
    protected $motCleService;

    public function __construct(array $config,$dbh) {
        $this->config = $config;
        $this->articleService = new ArticleService($dbh);
        $this->categoriesService = new CategorieService($dbh);
        $this->motCleService = new motCleService($dbh);
    }

    function index()
    {
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];
        $title='Home - POECSTORE';
        $articles = $this->articleService->findAllArticles();
        $categories = $this->categoriesService->findAllCategories();
        $mot_cles = $this->motCleService->findAllMotCles();
        require ROOT .'/views/web/pages/home.php';
    }


    function detailArticle($id)
    {
        if (empty($id)){
            echo "Article Unavailable";
        }else {
            $title="PoecBlog - Article Detail";
            $articles = $this->articleService->findOneArticle($id);
            $href = $this->config['href'];
            $hrefImage = $this->config['href_image'];
            $categories = $this->categoriesService->findAllCategories();
            $mot_cles = $this->motCleService->findAllMotCles();

            if (empty($articles)){
                echo "Post Unavailable";
            }
            require ROOT.'/views/web/pages/detail_article.php';
        }
    }

    function login(){
        require ROOT.'/views/web/pages/login.php';
    }

    function error404(){
        //$title="PoecBlog - error404";
       // require ROOT.'/views/web/pages/error404.php';
    }
}