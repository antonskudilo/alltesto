<?php


namespace Project\Models;

use \Core\Model;
use \Project\Components\Db;
class Category extends Model
{
    public static function getCategoriesList() {

        $db = Db::getConnection();

        $categoriesList = array();
        $result = $db->query("SELECT * FROM categories");
        $i = 0;
        while($row = $result->fetch(\PDO::FETCH_ASSOC)){
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $categoriesList[$i]['eng_name'] = $row['eng_name'];
            $i ++;
        }
        return $categoriesList;


    }
}