<?php


namespace Project\Controllers;

use Core\Controller;

class BlogController extends Controller
{
    public  function index(){
        $this->title = 'Блог';

        return $this->render('blog/index', [
            'greetings' => 'BlogController action index',
        ]);
    }

    public  function showArticle($params){

        $this->title = "Статья {$params['id']}";

        return $this->render('blog/article', [
            'id' => $params['id'],
        ]);
    }
}