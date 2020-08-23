<?php

class Info
{
    public function getInfo($db)
    {
        $sql_q = "SELECT * FROM info";
        $rs_q = $db->query($sql_q);
        $Info_rs = $rs_q->fetchAll(PDO::FETCH_ASSOC);
        return $Info_rs;
    }

   

    //Tri par note, descendant
    public function getInfoDateDes($db)
    {
        $sql_q = "SELECT * FROM `info` ORDER BY note DESC";
        $rs_q = $db->query($sql_q);
        $Info_rs = $rs_q->fetchAll(PDO::FETCH_ASSOC);
        return $Info_rs;
    }

    //Tri par note, ascendant
    public function getInfoDateAsc($db)
    {
        $sql_q = "SELECT * FROM `info` ORDER BY note ASC";
        $rs_q = $db->query($sql_q);
        $Info_rs = $rs_q->fetchAll(PDO::FETCH_ASSOC);
        return $Info_rs;
    }
}
?>