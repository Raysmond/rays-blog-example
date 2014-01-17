<?php
/**
 * UserController class
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class UserController extends RController
{
    public $access = array(
        User::AUTHENTICATED => array("logout", "edit", "changePassword")
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

    public function actionEdit($uid)
    {
        $user = User::get($uid);
        RAssert::not_null($user);

        if (Rays::user()->id === $user->id || Rays::user()->role === User::ADMIN) {
            $this->render("edit", array('user' => $user));
        }
    }

    public function actionChangePassword()
    {
        $data = array("user" => Rays::user());
        if (Rays::isPost()) {
            $user = Rays::user();
            if ($user->password === md5(@$_POST["old-password"])) {
                $validation = new RValidation(
                    array("label" => "New password", "field" => "new-password", "rules" => "trim|required|max_length[255]"),
                    array("label" => "New password confirm", "field" => "new-password-confirm", "rules" => "trim|required|max_length[255]|equals[new-password]")
                );
                if ($validation->run($_POST)) {
                    $user->password = md5($_POST["new-password"]);
                    if ($user->save()) {
                        $this->flash("message", "Password changed successfully.");
                        $this->redirectAction("user", "view", $user->id);
                    }
                } else {
                    $data["errors"] = $validation->getErrors();
                }
            } else {
                $this->flash("error", "Old password is not correct!");
            }
        }
        $this->render("change_password", $data);
    }

    public function actionView($uid = null)
    {
        RAssert::not_null($uid);
        $user = User::find("id", $uid)->where("[status]=?", User::STATUS_ACTIVE)->first();
        RAssert::not_null($user);

        $this->render("view", array("user" => $user));
    }
} 