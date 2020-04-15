<?php
namespace Project\Controllers;

use \Core\Controller;
use Project\Models\User as User;

class UserController extends Controller
{
    public function register()
    {
        $this->title = 'Регистрация';

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'имя не должно быть короче 2х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'пароль не должен быть короче 6 символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'неправильный email';
            }

            if (User::checkEmailExist($email)) {
                $errors[] = 'такой email уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        return $this->render('user/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'errors' => $errors,
            'result' => $result
        ]);
    }

    public function login()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkPassword($password)) {
                $errors[] = 'пароль не должен быть короче 6 символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'неправильный email';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'пользователь не найден';
            } else {
                User::auth($userId);

                header('Location: /cabinet');
            }
        }
        return $this->render('user/login', [
            'email' => $email,
            'password' => $password,
            'errors' => $errors,
            'userId' => $userId
        ]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
