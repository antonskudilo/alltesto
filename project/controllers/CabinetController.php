<?php


namespace Project\Controllers;
use \Core\Controller;
use Project\Models\User as User;

class CabinetController extends Controller
{
    public function index()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        return $this->render('cabinet/index', [
            'user' => $user,
            ]);
    }

    public function userEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];
        $email = $user['email'];

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

//            if (User::checkEmailExist($email)) {
//                $errors[] = 'такой email уже используется';
//            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $email, $password);
            }
        }

        return $this->render('user/edit', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'errors' => $errors,
            'result' => $result
        ]);
    }
}