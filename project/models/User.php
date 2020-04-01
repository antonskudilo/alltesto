<?php


namespace Project\Models;


use Project\Components\Db as Db;

class User
{
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql ='INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam('name', $name, \PDO::PARAM_STR);
        $result->bindParam('email', $email, \PDO::PARAM_STR);
        $result->bindParam('password', $password, \PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExist($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email'; //<- Подготовленный запрос без передачи параметра напрямую используя плэйсхолдер

        $result = $db->prepare($sql);
        $result->bindParam('email', $email, \PDO::PARAM_STR); //замена плэйсхолдера на параметр
        $result->execute();

        if ($result->fetchColumn()) return true; //проверяем, есть ли записи

        return false;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam('email', $email, \PDO::PARAM_STR);
        $result->bindParam('password', $password, \PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) return $user['id'];
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header('Location: /login');
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam('id', $id, \PDO::PARAM_STR);
            $result->setFetchMode(\PDO::FETCH_ASSOC); //указываем что хотим получить данные в виде массива
            $result->execute();

            return $result->fetch();

        }
    }

    public static function edit($userId, $name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id', $userId, \PDO::PARAM_INT);
        $result->bindParam('name', $name, \PDO::PARAM_STR);
        $result->bindParam('email', $email, \PDO::PARAM_STR);
        $result->bindParam('password', $password, \PDO::PARAM_STR);

        return $result->execute();
    }
}