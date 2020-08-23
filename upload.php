<?php
//Dans l'ordre 
//localhost / user / passorw /database
$conn = mysqli_connect("mysql-feedback.alwaysdata.net", "feedback", "Benkhalid2020", "feedback_med");
if($conn) {
//Si la connexion est établie 
echo "connected";
}
//Une fois le bouton submit 'uploadfilesub' est cliqué
if(isset($_POST['uploadfilesub'])) {
//Injection de variables
$filename = $_FILES['uploadfile']['name'];
$filetmpname = $_FILES['uploadfile']['tmp_name'];
//fichier de transfert des images et photos // gestion d'espace, extension, compression d'image et volum non génée
$folder = "images/";
//permet de délocaliser le fichier dans une nouvelle destination
move_uploaded_file($filetmpname, $folder.$filename);
//Insertion des images details dans la base de données
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];

$commentaire = $_POST['commentaire'];

if(isset($_POST['note'])) {
    switch($_POST['note']){
        case "note1" :
            $note = 1;
            break;
        case "note2":
            $note = 2;
            break;
        case "note3" :
            $note = 3;
            break;
        case "note4" :
            $note = 4;
            break;
        case "note5" :
            $note = 5;
            break;
        default:
        $name = 0;
    }
}

$sql = "INSERT INTO `info` (`email`, `pseudo`, `note`, `commentaire`,`photo`,`dateCreate`) VALUES ('$email','$pseudo', '$note', '$commentaire','$filename', NOW())";
$qry = mysqli_query($conn, $sql);
if( $qry) {
echo "</br>image uploaded";
}
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-label-group">
        <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo">
        <label for="Pseudo">Pseudo</label>
    </div>
    <div class="form-label-group">
        <input type="email" id="email" name="email" value="yourmail@mail.com" class="form-control" placeholder="Email address"  autofocus>
        <label for="inputEmail">Email</label>
    </div>
    <div class="mb-3">
        <select class="custom-select" name="note" required
            style="height: 4.125rem; padding: .75rem; border-radius: 6px 6px 6px 6px; font-size: 16px;">
            <option value="choix">Choisur une note sur 5...</option>
            <option value="note1">1</option>
            <option value="note2">2</option>
            <option value="note3">3</option>
            <option value="note4">4</option>
            <option value="note5">5</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Commentaire</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="commentaire" rows="3"></textarea>
        <script>
                        CKEDITOR.replace( 'commentaire' );
                </script>
    </div>


    <input type="file" name="uploadfile" />
    <div class="checkbox mb-3">
    </div>
    <input type="submit" class="btn btn-lg btn-primary btn-block heightButton" style="font-size: 16px; height: 60px"
        name="uploadfilesub" value="Ajouter ce commentaire" />
</form>

