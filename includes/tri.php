<?php 
//tri 
require_once 'includes/dataBase.php';
require_once 'includes/Info.php';
require_once 'includes/Comment.php';


// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$info = new Info();
// Aller chercher tous les enregistrements 
$allInfo = $info->getInfo($o_conn);


?>

<?php 
require_once 'includes/dataBase.php';
require_once 'includes/Info.php';
require_once 'includes/Comment.php';


// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$info = new Info();
// Aller chercher tous les enregistrements 
$allInfo = $info->getInfoDateDes($o_conn);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Test 2020</title>
    <link rel="icon" type="image/png" href="https://static.alwaysdata.com/aldjango/img/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://static.alwaysdata.com/css/administration.css" type="text/css" media="all" />

    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>


</head>

<body style="align-items: baseline;">

    <div class="container">
        <h1><a href="http://feedback.alwaysdata.net/index.php">Formulaire d'avis</a></h1>
        <?php 
$start = '';
    if(isset($_POST['search'])){

        $start = $_POST['start'];
        $selectStmt = $o_conn->prepare('SELECT * FROM info WHERE note like :start');
        $selectStmt-> execute(array(
            ':start'=>$start
        ));
        $allInfo = $selectStmt->fetchAll();

    }
?>

        <form action="" method="post">
            <div class="col">
                <select class="form-control" name="start">
                    <option>Filtre et trie</option>
                    
                    <option value="5"><?php if($start == '5') {echo 'selected';}?>5/5</option>
                    <option value="3"><?php if($start == '3') {echo 'selected';}?>3/5</option>
                    <option value="2"><?php if($start == '2') {echo 'selected';}?>Moins de 2/5</option>
                    <option value="ASC" <?php if($start == 'ASC') {echo 'selected';}?>>Date ascendant</option>
                    <option value="DESC" <?php if($start == 'DESC') {echo 'selected';}?>>Date descendant</option>
                </select>
                <input type="submit" name="search" value="valider">
            </div>
        </form>



        <div class="container">
            <h2>- Liste des avis</h2>
        </div>

        <?php 
    foreach ($allInfo as $ligne) {
?>


        <div class="card mb-3">
            <div class="row">
                <div class="col-6 col-md-2">
                    <img src="images/<?php   echo $email = $ligne["photo"]; ?>" style="width:100%; padding: 10px;"
                        alt="">
                    <div class="col">
                        <h5 class="card-title"><span>Pseudo : </span><?php   echo $pseudo = $ligne["pseudo"]; ?>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 class="card-title"><?php   echo $dateCreate = $ligne["dateCreate"]; ?>
                        </h5>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><span>Email : </span><?php   echo $email = $ligne["email"]; ?></h5>

                        <h5 class="card-title"><span>Note : </span><?php   echo $pseudo = $ligne["note"]; ?>/10</h5>
                        <h5 class="card-title"><span>Commentaire :
                            </span><?php   echo $commentaire = $ligne["commentaire"]; ?></h5>
                        <br />
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
 ?>

        <br />
        <br />

        <div class="col">
            <h2>Ajouter un avis </2>
        </div>

        <div class="text-center mb-4" style="padding: 0 190px">

            <!-- Form add feedback -->
            <?php include_once 'upload.php'; ?>
            <p class="mt-5 mb-3 text-muted text-center small">Réalisé par BENKHALID MOHAMMED</p>
            <p class="mt-5 mb-3 text-muted text-center small">&copy; 2020</p>
        </div>




</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
    integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
</script>

</html>