<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 28/08/14
 * Time: 10:03
 */

class PagesController extends Controller {



    protected $articleService;
    protected $categoriesService;
    protected $motCleService;
    protected $utilisateurService;

    public function __construct(array $config,$dbh) {
        $this->config = $config;
        $this->articleService = new ArticleService($dbh);
        $this->categoriesService = new CategorieService($dbh);
        $this->motCleService = new motCleService($dbh);
        $this->utilisateurService = new utilisateurService($dbh);
    }

    function index()
    {
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];
        $title='Home - POECSTORE';
        $articles = $this->articleService->findAllArticles();
        $categories = $this->categoriesService->findAllCategories();
        $mot_cles = $this->motCleService->findAllMotCles();
        $id_category = 1;
        if(isset($_GET["cat"]) ) {
            $id_category = $_GET["cat"];
        }

        $ArticlesByCategory = $this->articleService->findByCategory($id_category);

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

        if (isset($_POST['submit_sign_form'])){

            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_SANITIZE_EMAIL);

            $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>6) ? true : false;


            if ($isEmailValid and $isPasswordValid){
                $sign = $this->utilisateurService->insertNewUser($email, $password);
                var_dump($sign);
                if($sign == null) {
                    $this->setFlash("Succes inscription","success");
                } else {
                    $this->setFlash("Inscription Unavailable -  ".$sign,"warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }

        }




        require ROOT.'/views/web/pages/login.php';
    }

    function error404(){
        $title="POECSTORE - error404";
        $href = $this->config['href'];
       require ROOT.'/views/web/pages/error404.php';
    }
}