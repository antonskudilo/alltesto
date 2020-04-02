<?php
namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Category as Category;

class SiteController extends Controller
{


//    public function actionContact()
//    {
//        $mail = 'casmoll@mail.ru';
//        $subject = 'Тема письма';
//        $message = 'Содержание письма';
//        $result = mail($mail, $subject, $message);
//        var_dump($result);
//        die;
//    }

    public  function index(){
        $this->title = 'главная';

        $categories = array();
        $categories = Category::getCategoriesList();

        return $this->render('site/index', [
            'categories' => $categories,
        ]);
    }
}