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
        $id_category = 0;
        if(isset($_GET["cat"]) ) {
            $id_category = $_GET["cat"];
            $ArticlesByMehtod = $this->articleService->findByCategory($id_category);
        }
        else {
            $ArticlesByMehtod = $this->articleService->findAllArticles();
        }

        $id_mot_cle = 0;
        if(isset($_GET["mot"]) ) {
            $id_mot_cle = $_GET["mot"];
            $ArticlesByMehtod = $this->articleService->findByMotCle($id_mot_cle);
        }


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
            if (isset($_POST['submit_to_cart'])){
                $_SESSION['panier']["$articles[$id]"] = $_POST['submit_to_cart'];
            }
            if (empty($articles)){
                require ROOT.'/views/web/pages/error404.php';
            }
            require ROOT.'/views/web/pages/detail_article.php';
        }

    }

    function login(){
        $href = $this->config['href'];
        if (isset($_POST['submit_sign_form'])){

            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

            $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>6) ? true : false;


            if ($isEmailValid and $isPasswordValid){
                $sign = $this->utilisateurService->insertNewUser($email, $password);
                if($sign == null) {
                    $this->setFlash("Succes inscription","success");
                } else {
                    $this->setFlash("Inscription Unavailable -  ".$sign,"warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }

        }

        if (isset($_POST['submit_login_form'])){

            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_SANITIZE_EMAIL);

            $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>6) ? true : false;


            if ($isEmailValid and $isPasswordValid){
                $sign = $this->utilisateurService->checkUser($email, $password);
                if($sign) {
                    $_SESSION['email'] = $email;
                    $_SESSION['connected'] = true;

                    $this->setFlash("Succes inscription","success");
                    header ('location: index.php');

                } else {
                    $this->setFlash("Connection fails. Check your email and password.  ".$sign,"warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }
        }


        require ROOT.'/views/web/pages/login.php';
    }

    function deconnexion()
    {
        if(isset($_SESSION['email']))
        {
            $_SESSION = array();
            session_destroy();
        }

        header("Location: index.php");
        exit();
    }

    function profil()
    {
        $href = $this->config['href'];
        require ROOT.'/views/web/pages/profil.php';
    }

    function error404(){
        $href = $this->config['href'];
        $title="POECSTORE - error404";
       require ROOT.'/views/web/pages/error404.php';
    }

    function panier(){
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];
        $tva =.2;
        // erreur a check
        if(empty($_SESSION['panier']))
        {
            $tab_ids  = array(0);
                    }
        else{
            $tab_ids = array_keys($_SESSION['panier']);

            }
        $panier_courant = $this->articleService->findAllArticlesById($tab_ids);

        require ROOT.'/views/web/pages/panier.php';
    }

    function addToCart($id_article)
    {

        if(isset($_POST['quantite_modifie_article']))
        {
            $_SESSION['panier'][$id_article] = $_POST['quantite_modifie_article'];
        }
        else{

        if(!isset($_POST['quantite_article']))
        {
            $_SESSION['panier'][$id_article] += 1;
        }
        else{
            $_SESSION['panier'][$id_article] += $_POST['quantite_article'];
        }
    }
        $url = $this->url('pages','panier');
        header("Location:$url");
        exit();

    }
    function removeCart($id_article)
    {

            unset($_SESSION['panier'][$id_article] )  ;


        $url = $this->url('pages','panier');
        header("Location:$url");
        exit();

    }

}