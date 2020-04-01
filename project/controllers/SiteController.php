<?php
namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Test as Test;

class SiteController extends Controller
{
    public  function select()
    {
        $this->title = 'главная';
        return $this->render('site/select', [
        ]);
    }

    public function testing()
    {
        $this->title = 'тестирование';
        $test = new Test($_POST['quantity'], $_POST['theme']);
        $questions = $test->getQuestsList();
        return $this->render('site/testing', [
            'questions' => $questions,
        ]);

    }

    public  function result()
    {
        $this->title = 'результат';
        $result = Test::getResult($_POST);
        return $this->render('site/result', [
            'result' => $result,
        ]);
    }

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