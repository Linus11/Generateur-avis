<?php

class Comment
{
    public function InsertComment($db, $email, $pseudo, $note, $commentaire, $photo)
    {
        //echo 'console.log(' . "Insert comment :: console" . ')';

        $req_comment = "INSERT INTO info 
        (email, pseudo, note, commentaire, photo) VALUES (:email, :pseudo, :note, :commentaire, :photo);";

        $req_comment_prep = $db->prepare($req_comment);
        $req_comment_prep->execute($dataCom);
        var_dump(" et " . $db->prepare($req_comment));
        return $reqCom;
    }
}
?>