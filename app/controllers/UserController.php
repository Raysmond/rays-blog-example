<?php
/**
 * UserController class
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class UserController extends RController
{
    /**
     * @var array access array for actions
     */
    public $access = array(
        User::AUTHENTICATED => array("logout")
    );

    public function actionLogin()
    {
        RAssert::is_true(!Rays::isLogin());

        if (Rays::isPost()) {
            $user = new User($_POST);
            if ($user->validate("login")) {
                if (($login = User::find("name", $user->name)->where("[status]=?", User::STATUS_ACTIVE)->first()) !== null) {
                    if ($login->password == md5($_POST["password"])) {
                        Rays::app()->login($login);
                        $this->redirect(Rays::baseUrl());
                    }
                    $this->flash("error", "User name and password are not matched!");
                }
                $this->flash("error", "No such user.");
            }
            $data = array("errors" => $user->getErrors(), "form" => $_POST);
        }
        $this->render("login", isset($data) ? $data : null);
    }

    public function actionRegister()
    {
        RAssert::is_true(!Rays::isLogin());

        $data = array();
        if (Rays::isPost()) {
            $data["form"] = $_POST;
            $validation = new RValidation(User::getRegisterRules());

            if ($validation->run($_POST)) {
                $user = new User($_POST);
                $user->password = md5($_POST["password"]);
                $user->role = User::AUTHENTICATED;
                $user->registerTime = date('Y-m-d H:i:s');
                $user->status = User::STATUS_ACTIVE;
                if ($user->save()) {
                    $this->flash("message", "Register successfully. Your username is " . $user->name . ".");
                    $this->redirectAction("user", "login");
                }
            }

            $data["errors"] = $validation->getErrors();
        }
        $this->render("register", $data);
    }

    public function actionLogout()
    {
        Rays::app()->logout();
        $this->redirect(Rays::baseUrl());
    }

    public function actionView($uid = null)
    {
        RAssert::not_null($uid);
        $user = User::find("id", $uid)->where("[status]=?", User::STATUS_ACTIVE);
        RAssert::not_null($user);

        $this->render("view", array("user" => $user));
    }
} 