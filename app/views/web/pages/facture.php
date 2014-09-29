<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

<!--
pour récuperer le  panier, prend le html du panier.php ou du validation.php
et voici les données
$_SESSION['panier']

tu fais un var dump dessus pour voir le concret

au pire des cas,ctrl c ctrl v via validation.php

--

pour le client recup les données  via

$_SESSION['validation']['client']

fait un var dump pour voir les correspondances


-->


<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>