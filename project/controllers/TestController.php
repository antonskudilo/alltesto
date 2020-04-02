<?php


namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Test as Test;
class TestController
{
    public  function select()
    {
        $this->title = 'главная';
        return $this->render('test/select', [
        ]);
    }

    public function testing()
    {
        $this->title = 'тестирование';
        $test = new Test($_POST['quantity'], $_POST['theme']);
        $questions = $test->getQuestsList();
        return $this->render('test/testing', [
            'questions' => $questions,
        ]);

    }

    public  function result()
    {
        $this->title = 'результат';
        $result = Test::getResult($_POST);
        return $this->render('test/result', [
            'result' => $result,
        ]);
    }
}