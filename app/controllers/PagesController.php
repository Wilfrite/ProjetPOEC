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
    protected $profilService;
    protected $adresseService;

    public function __construct(array $config,$dbh) {
        $this->config = $config;
        $this->articleService = new ArticleService($dbh);
        $this->categoriesService = new CategorieService($dbh);
        $this->motCleService = new motCleService($dbh);
        $this->utilisateurService = new utilisateurService($dbh);
        $this->profilService = new profilService($dbh);
        $this->adresseService = new adresseService($dbh);
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
        $ArticlesByMehtod=0;

        if(isset($_GET["cat"]) )
        {
            $id_category = $_GET["cat"];
            $ArticlesByMehtod = $this->articleService->findByCategory($id_category);
        }
        else {
            $ArticlesByMehtod = $this->articleService->findAllArticles();
        }

        $id_mot_cle = 0;
        if(isset($_GET["mot"]) )
        {
            $id_mot_cle = $_GET["mot"];
            $ArticlesByMehtod = $this->articleService->findByMotCle($id_mot_cle);
        }

        if ((isset($_GET["cat"])) && (isset($_GET["mot"])))
        {
            if  ($_GET["cat"] != 0)
            {
            $id_mot_cle = $_GET["mot"];
            $id_category = $_GET["cat"];
            $ArticlesByMehtod = $this->articleService->findBySearch($id_category,$id_mot_cle);
            }
            else
            {
                $id_mot_cle = $_GET["mot"];
                $ArticlesByMehtod = $this->articleService->findBySearchWithNews($id_mot_cle);
            }
        }

        if ($ArticlesByMehtod == null)
        {
            require ROOT.'/views/web/pages/error404.php';
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

        // validation des informations de l'inscription
        if (isset($_POST['submit_sign_form'])){

            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

            $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>5) ? true : false;

            // Methode d'ajout d'un nouvelle utilisateur
            if ($isEmailValid and $isPasswordValid)
            {
                $idNewUser = $this->utilisateurService->insertNewUser($email, $password);
                $idNewAdresse = $this->adresseService->insertNewAdresse();

                if($idNewUser > 0)
                {
                    $this->profilService->insertNewProfil($idNewUser, $idNewAdresse);
                    $this->setFlash("Succes inscription","success");
                } else {
                    $this->setFlash("Inscription Unavailable -  ".$idNewUser,"warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }

        }

        // validation des informations de connexion
        if (isset($_POST['submit_login_form'])){

            $email= filter_var($_POST['emaillog'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

            $password= filter_var($_POST['passwordlog'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>5) ? true : false;

            // comparaison des informations de la base puis connexion
            if ($isEmailValid and $isPasswordValid){

                $sign = $this->utilisateurService->checkUser($email, $password);

                if($sign) {
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $sign[0]->getid();
                    $_SESSION['validation']['step'] = 'step_0';

                    $this->setFlash("Succes inscription","success");
                    header ('location: index.php');
                    exit();
                } else {
                    $this->setFlash("Connection fails. Check your email and password.  ","warning");
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
        $viewProfil = $this->profilService->viewProfil($_SESSION['id']);

        // recuperation puis modification des informations du profil
        if (isset($_POST['submit_update_profil_form'])){

            $prenom =filter_var($_POST['prenom'],FILTER_SANITIZE_STRING);
            $nom =filter_var($_POST['nom'],FILTER_SANITIZE_STRING);
            $adresse =filter_var($_POST['adresse'],FILTER_SANITIZE_STRING);
            $codePostal =filter_var($_POST['codePostal'],FILTER_SANITIZE_STRING);
            $ville =filter_var($_POST['ville'],FILTER_SANITIZE_STRING);

            $profilUpdate = $this->profilService->updateProfil($_SESSION['id'], $prenom, $nom, $adresse, $codePostal, $ville);


            if(!$profilUpdate)
            {
                $this->setFlash("Success update","success");
                $url = $this->url('pages','profil');
                header("Location:$url");
                exit();
            }
        }

        // validation des informations pour la modification du password
        if (isset($_POST['submit_update_password_form'])){

            $password= filter_var($_POST['motDePasse'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>5) ? true : false;

            $passwordNew= filter_var($_POST['motDePasseNouveau'], FILTER_SANITIZE_STRING);
            $isPasswordNewValid = (strlen($password)>5) ? true : false;

            // comparaison des informations avec la base
            if ($isPasswordValid and $isPasswordNewValid and $passwordNew == $_POST['motDePasseNouveauConfirmation']){

                $sign = $this->utilisateurService->checkModifUser($_SESSION['id'], $password);

                // mise a jour du password
                if($sign) {

                    $this->utilisateurService->updatePassword($_SESSION['id'], $passwordNew);

                    $this->setFlash("Succes Modification","success");
                    $url = $this->url('pages','profil');
                    header("Location:$url");
                    exit();
                } else {
                    $this->setFlash("Connection fails. Check your password.","warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }
        }

        // validation des informations pour la modification du mail
        if (isset($_POST['submit_update_mail_form'])){

            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

            $password= filter_var($_POST['motDePasse'], FILTER_SANITIZE_STRING);
            $isPasswordValid = (strlen($password)>5) ? true : false;

            // comparaison des informations avec la base
            if ($isEmailValid and $isPasswordValid){

                $sign = $this->utilisateurService->checkModifUser($_SESSION['id'], $password);

                // Mise a jour de l'email
                if($sign) {

                    $this->utilisateurService->updateMail($_SESSION['id'], $email);

                    $_SESSION['email'] = $email;

                    $this->setFlash("Succes Modification","success");
                    $url = $this->url('pages','profil');
                    header("Location:$url");
                    exit();
                } else {
                    $this->setFlash("Connection fails. Check your password.","warning");
                }

            } else {
                $this->setFlash("Email must be a valid and Password must be a minimun of 6 characters","danger");
            }
        }

        require ROOT.'/views/web/pages/profil.php';
    }

    function error404(){
        $href = $this->config['href'];
        $title="POECSTORE - error404";
       require ROOT.'/views/web/pages/error404.php';
    }

    function panier($valide){
        // constantes
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];

        $tva =.2;
        // gestion d'erreur du panier vide
        if(empty($_SESSION['panier']))
        {
            $tab_ids  = array(0);
                    }
        else{
            $tab_ids = array_keys($_SESSION['panier']);

            }
//  récuperation des articles dans le panier (tableau d'objets)
        $panier_courant = $this->articleService->findAllArticlesById($tab_ids);

        // passage de validation de panier avec redirection au login  si session  inexistante
        if ($valide== "valide")
        {

           if ( isset($_SESSION['email']) and !empty($_SESSION['panier']) ) // step 1
           {
               $_SESSION['validation']['step'] = 'step_1_confirmed';
               $viewProfil = $this->profilService->viewProfil($_SESSION['id']);
            require ROOT.'/views/web/pages/validation.php';
           }
            else  if ( !isset($_SESSION['email']))
            {
                require ROOT.'/views/web/pages/login.php';
            }
            else if (empty($_SESSION['panier']))
            {
                $_SESSION['validation']['step'] = 'step_0';
                header("Location:index.php");
                exit();
            }
        } else {
              require ROOT.'/views/web/pages/panier.php';
        }

        // passage de confirmation (en cours)



    }
// ajouter au panier
    function addToCart($id_article)
    {
    // recupère la quantité modifié au panier
        if(isset($_POST['quantite_modifie_article']))
        {
            if ($_POST['quantite_modifie_article']>0)
            $_SESSION['panier'][$id_article] = intval($_POST['quantite_modifie_article']);
        }
        else{
            // ajout d'un article sur le  home / index
            if(!isset($_POST['quantite_article']))
            {
                $_SESSION['panier'][$id_article] += 1;
            }
            else
            {   // ajout du nombre d'articles sur la page  detail
                if ($_POST['quantite_article']>0)
                {
                $_SESSION['panier'][$id_article] += intval($_POST['quantite_article']);
                }
                else
                {   // redirection sur lui meme si erreur d'indication
                    $url = $this->url('pages','article',"$id_article");
                    header("Location:$url");
                    exit();
                }
            }
        }
        //retour sur  panier pour voir l'action
        $url = $this->url('pages','panier');
        header("Location:$url");
        exit();

    }
    // retirer de  l'article
    function removeCart($id_article)
    {

            unset($_SESSION['panier'][$id_article] )  ;


        $url = $this->url('pages','panier');
        header("Location:$url");
        exit();

    }
    function contact(){
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];
        require ROOT.'/views/web/pages/contact.php';
    }

    function paiement (){
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];

        if ($_SESSION['validation']['step'] == 'step_3_confirmed' )  // step 3 to step 4
        {
            // recuperation
            if (isset($_POST['submit_cb_form'])){

                $nom =filter_var($_POST['nom'],FILTER_SANITIZE_STRING);
                $isNomValid = (strlen($nom)>5) ? true : false;

                $nb_cb =filter_var($_POST['nb_cb'],FILTER_SANITIZE_NUMBER_INT);
                $isCBValid = (strlen($nb_cb)>15) ? true : false;

                $mois = $_POST['mois'];
                $annee = $_POST['annee'];

                $nb_verif =filter_var($_POST['nb_verif'],FILTER_SANITIZE_NUMBER_INT);
                $isVerifValid = (strlen($nb_verif)>2) ? true : false;

                if($isNomValid and $isCBValid and $isVerifValid)
                {
                    var_dump($nom, $nb_cb, $mois, $annee, $nb_verif);
                    $_SESSION['validation']['step'] = 'step_4_confirmed';

                    $url = $this->url('pages','facture');
                    header("Location:$url");
                    exit();

                } else {
                    $this->setFlash("Information Incorect. Le numero de la CB est composer de 16 chiffre et le cryptograme de 3","warning");
                }
            }
        }
        else {
            $_SESSION['validation']['step'] = 'step_0';
            header("Location:index.php");
            exit();
        }

        require ROOT.'/views/web/pages/paiement.php';
    }

    function validation_to_pay($control)
    {
        $href = $this->config['href'];
        $hrefImage = $this->config['href_image'];
        unset($_SESSION['validation']['client']);
        if ($_SESSION['validation']['step'] == 'step_1_confirmed' && !empty($_POST))  // step 1 to step 2
        {


                $_SESSION['validation']['client']['prenom'] =filter_var($_POST['prenom_commande'],FILTER_SANITIZE_STRING);
                $_SESSION['validation']['client']['nom'] =filter_var($_POST['nom_commande'],FILTER_SANITIZE_STRING);
                $_SESSION['validation']['client']['adresse'] =filter_var($_POST['adresse_commande'],FILTER_SANITIZE_STRING);
                $_SESSION['validation']['client']['codePostal'] =filter_var($_POST['codePostal_commande'],FILTER_SANITIZE_STRING);
                $_SESSION['validation']['client']['ville'] =filter_var($_POST['ville_commande'],FILTER_SANITIZE_STRING);

                $_SESSION['validation']['step'] = 'step_2_confirmed';

        }
        else {
            $_SESSION['validation']['step'] = 'step_0';
            header("Location:index.php");
            exit();
        }
        if ($_SESSION['validation']['step'] == 'step_2_confirmed'  ) // step 2 to step 3
        {
            $adresse_vide =null;
            foreach ($_POST as $var_adresse)
            {
                if (empty($var_adresse))
                {

                     $adresse_vide ++ ;
                }
            }

            if (is_null($adresse_vide))
            {
                $_SESSION['validation']['step'] = 'step_3_confirmed';
                $url = $this->url('pages','paiement');
                header("Location:$url");
                exit();
            }
            else
            {
                $this->setFlash("Information Incorect. L'adresse de livraison est incomplète","warning");
                $url = $this->url('pages','panier','valide');
               header("Location:$url");
               exit();
            }
        }
        else {
            $_SESSION['validation']['step'] = 'step_0';
            header("Location:index.php");
            exit();
        }

    }

    function facture() {
        if ($_SESSION['validation']['step'] == 'step_4_confirmed' )  // step 4 checked
        {



        }
        else {
            $_SESSION['validation']['step'] = 'step_0';
            header("Location:index.php");
            exit();
        }

    require ROOT.'/views/web/pages/facture.php';
    }
}