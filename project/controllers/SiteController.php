<?php
namespace Project\Controllers;

use Core\Controller;


class SiteController extends Controller
{
    public  function index(){
        $this->title = 'главная';

        return $this->render('site/index', [
            'q' => "Переменная",
        ]);
    }


//    public  function index(){
//        $this->title = 'главная';
//        require_once ROOT . '/vendor/autoload.php';
//
//        require_once ROOT . '/vendor/twig/twig/lib/Twig/Autoloader.php';
//
//        $loader = new Twig_Loader_Filesystem(ROOT . '/project/template');
//
//        $twig = new Twig_Environment($loader, array(
//            'cache' => ROOT . '/project/cache',
//        ));
//
//        return $twig->render('template.php', array('name' => 'Fabien'));
////        return $this->render('site/index', [
////
////        ]);
//    }



//    public function actionContact()
//    {
//        $mail = 'casmoll@mail.ru';
//        $subject = 'Тема письма';
//        $message = 'Содержание письма';
//        $result = mail($mail, $subject, $message);
//        var_dump($result);
//        die;
//    }
}