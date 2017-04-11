<?php
$form->prepare();
var_dump($_POST);
//    foreach($form->getMessages() as $name => $message) {
//            var_dump($message);
//    }
?>

<!-- Header
    ============================================= -->
<header id="header">
    <div id="header-wrap">
        <div class="container-fluid clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <div id="logo"> <a href=""> <img src="../public/images/Placeholder+Logo.png" ></a> </div>

            <!-- Primary Navigation ============================================= -->
            <nav id="primary-menu" class="style-2 center">
                <ul class="one-page-menu">
                    <li><a href="#" data-href="#most-toppest"><div class="compagnie">La compagnie</div></a></li>
                    <li><a href="#" data-href="#most-toppest"><div class="spectacle">Les spectacles</div></a></li>
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header>


<div id="page-menu">

    <div id="page-menu-wrap">

        <div class="container-fluid clearfix">

            <div class="menu-title">Administration</div>

            <nav>
                <ul>
                    <li class="content"><a  href="#" data-href="#"><div>Infos principales</div></a></li>
                    <li><a href="#" data-href="#personnages"><div>Les Personnages</div></a></li>
                    <li><a href="#" data-href="#galerie"><div>Galerie Multimedia</div></a></li>
                    <li><a href="#" data-href="#calendrier"><div>Le Calendrier</div></a></li>
                    <li><a href="#" data-href="#presse"><div>Les articles de presse</div></a></li>
                </ul>
            </nav>

            <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

        </div>

    </div>

</div><!-- #page-menu end -->


<form name="addPersoForm" method="post" action="index.php?route=addPersonnage" class="form-horizontal">
    <div class="form-group">
        <label for="nomPersonnage" class="col-sm-2 control-label">Nom :</label>
        <div class="col-sm-2">

<!--            <input type="text" class="form-control" name="nomPersonnage" id="nomPersonnage" placeholder="Nom"-->
<!--                   value="--><?php //echo $value->getNomPersonnage(); ?><!--" />-->

            <input type="text" class="form-control" name="nomPersonnage" id="nomPersonnage"
                   placeholder="Nom" value="<?php echo $form->get('nomPersonnage')->getValue(); ?>" />
        </div>
    </div>

    <div class="form-group">
        <label for="prenomPersonnage" class="col-sm-2 control-label">Prenom :</label>
        <div class="col-sm-2">
<!--            <input type="text" class="form-control" name="prenomPersonnage" id="prenomPersonnage" placeholder="Prenom"-->
<!--                   value="--><?php //echo $value->getPrenomPersonnage(); ?><!--" />-->

            <input type="text" class="form-control" name="prenomPersonnage" id="prenomPersonnage"
                   placeholder="Prenom" value="<?php echo $form->get('prenomPersonnage')->getValue(); ?>" />
        </div>
    </div>

    <div class="form-group">
        <label for="nomPersonnage" class="col-sm-2 control-label">Description :</label>
        <div class="col-sm-2">
<!--            <input type="text" class="form-control" name="descriptionPersonnage" id="descriptionPersonnage"-->
<!--                   placeholder="Description" value="--><?php //echo $value->getNomPersonnage(); ?><!--" />-->

            <input type="text" class="form-control" name="descriptionPersonnage" id="descriptionPersonnage"
                   placeholder="Description" value="<?php echo $form->get('descriptionPersonnage')->getValue(); ?>" />
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
        <input type="file" id="exampleInputFile">
    </div>


    <!--    <input type="hidden" name="csrf" value="--><?php //echo $form->get('csrf')->getValue(); ?><!--">-->

<!--        <input type="hidden" name="id" value=" --><?php //echo $value->getId();?><!-- ">-->

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="Envoyer" value="Envoyer" class="btn btn-default">Envoyer</button>
        </div>
    </div>

</form>


<!--<div class="form-group">-->
<!--    <label for="{{ form.get('NomLDor').name }}">{{ form.get('NomLDor').label }}</label>-->
<!--    <input required ="required" class="form-control" value="{{ value.nom }}" type="text"-->
<!--           id="{{ form.get('NomLDor').name }}" name="{{ form.get('NomLDor').name }}" />-->
<!--</div>-->









<div class="row titre">
    <div class="col-xs-12 text-center">
        <h3>Afficher la liste des personnages</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-10 col-lg-offset-2">
        <?php foreach ($personnages as $personnage) :?>
            <div class="col-lg-4 thumbnail text-center">
                <h3><?php echo $personnage->getNomPersonnage();?>  <?php echo $personnage->getPrenomPersonnage();?></h3>
                <p><?php echo $personnage->getDescriptionPersonnage(); ?></p>
                <form action="index.php?route=updatePersonnage" method="post">
                    <input type="hidden" name="id" value="<?php echo $personnage->getId(); ?>">
                    <input class="btn btn-warning" type="submit" name="updatePersonnage" value="Modifier">
                </form>
                <form action="index.php?route=deletePersonnage" method="post">
                    <input type="hidden" name="id" value="<?php echo $personnage->getId(); ?>">
                    <input class="btn btn-danger" type="submit" name="deletePersonnage" value="Supprimer">
                </form>
            </div>
        <?php endforeach ?>
    </div>

</div>