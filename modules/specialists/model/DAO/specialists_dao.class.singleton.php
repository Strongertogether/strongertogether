<?php
class specialists_dao {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function details_products_DAO($db,$id) {
        $sql = "SELECT * FROM specialists WHERE id=".$id;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function select_column_products_DAO($db, $arrArgument) {
        $sql = "SELECT " . $arrArgument . " FROM specialists ORDER BY " . $arrArgument;

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT DISTINCT * FROM specialists WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
     public function count_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT COUNT(*) as total FROM specialists WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function select_like_limit_products_DAO($db, $arrArgument) {

        $sql="SELECT DISTINCT * FROM specialists WHERE ".$arrArgument['column']." like '%". $arrArgument['like']. "%' ORDER BY id ASC LIMIT ". $arrArgument['position']." , ". $arrArgument['limit'];

        $stmt=$db->ejecutar($sql);

        return $db->listar($stmt);
    }

}
