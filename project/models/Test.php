<?php


namespace Project\Models;
use Project\Components\Db as Db;

class Test
{
    public $questsQuantity;
    public $questsTheme;

    public function __construct($questsQuantity, $questTheme)
    {
        $this->questsQuantity = $questsQuantity;
        $this->questsTheme = $questTheme;
    }

    public function hello()
    {
        $message = 'Количество вопросов: ' . $this->questsQuantity . '<br>';
        $message .= 'Выбранная тема: ' . $this->questsTheme . '<br>';
        return $message;
    }

    public function getQuestsList()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM questions WHERE category = '{$this->questsTheme}' LIMIT {$this->questsQuantity}");
        $questsList = array();
        $i = 0;
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $questsList[$i]['id'] = $row['id'];
            $questsList[$i]['text'] = $row['text'];
            $i ++;
        }
        return $questsList;
    }

    public static function getResult($answers)
    {
        $db = Db::getConnection();
        $result = 0;
        foreach ($answers as $questionId => $answer) {
            $rightAnswer = $db->query("SELECT answer FROM questions WHERE id = '{$questionId}'");
            if ( $answer == $rightAnswer->fetch(\PDO::FETCH_COLUMN, 4) ) {
                $result++;
            }
        }
        return $result;
    }
}