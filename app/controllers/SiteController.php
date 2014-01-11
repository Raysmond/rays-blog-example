<?php
/**
 * SiteController
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class SiteController extends RController
{
    // public $defaultAction = "index";
    // public $layout = "index";
    public $access = array(
        User::ADMIN => array("config")
    );

    public function actionIndex()
    {
        $cache = new RCacheFile(Rays::app()->getConfig("cache"));
        if (($content = $cache->get("page", "index")) !== false) {
            $this->renderContent($content);
            return;
        }
        $config = Configuration::getConfiguration();
        $id = $config->getConfig("front_page_intro_id");
        $intro = $id !== null ? Post::get($id) : null;
        if (null !== $intro && $intro->contentType === Post::TYPE_MARKDOWN) {
            $intro->parseContent();
        }
        $content = $this->renderPartial("index", array("intro" => $intro), true);
        $cache->set("page", "index", $content);
        $this->renderContent($content);
    }

    public function actionContact()
    {
        $this->setHeaderTitle("Contact");
        $data = array();
        if (Rays::isPost()) {
            // do some thing
            $validation = new RValidation(array(
                array("field" => "name", "label" => "Name", "rules" => "trim|required"),
                array("field" => "email", "label" => "Email", "rules" => "trim|required"),
                array("field" => "subject", "label" => "Subject", "rules" => "trim|required"),
                array("field" => "content", "label" => "Content", "rules" => "trim|required"),
            ));
            if ($validation->run($_POST)) {
                Rays::import("application.extensions.phpmailer.MailHelper");
                MailHelper::sendEmail($_POST["subject"] . " - from Raysmond.com", $_POST["content"], Configuration::getConfiguration()->getConfig("site_email"), $_POST["name"], $_POST["email"]);
                $this->flash("message", "Thanks for your contact!");
            } else {
                $data["errors"] = $validation->getErrors();
            }
        }
        $this->render("contact", $data);
    }

    public function actionConfig()
    {
        $config = Variable::get("site_configuration");
        if (Rays::isPost()) {
            if (isset($_POST["new_configs_keys"])) {
                $keys = $_POST["new_configs_keys"];
                $values = $_POST["new_configs_values"];
                for ($i = 0; $i < count($keys); $i++) {
                    if (!isset($_POST[$keys[$i]]))
                        $_POST[$keys[$i]] = $values[$i];
                }
                unset($_POST["new_configs_keys"]);
                unset($_POST["new_configs_values"]);
            }
            if ($config === null)
                $config = new Variable();
            // validations
            $config->value = array_merge($config->value, $_POST);
            if ($config->validate_save() === false) {
                $this->render("config", array('config' => $config, 'errors' => $config->getErrors()));
            }
        }
        $this->render("config", array('config' => ($config === null ? null : $config->value)));
    }

    /**
     * Exception handling
     * @param Exception $e
     */
    public function actionException(Exception $e)
    {
        if ($e instanceof RPageNotFoundException || $e->getCode() === 404) {
            $urlAlias = UrlAlias::find("aliasUrl", Rays::uri())->first();
            if ($urlAlias !== null) {
                $uri = $urlAlias->source;
                Rays::app()->runController(Rays::router()->getRouteUrl($uri));
                exit;
            }
            $this->setHeaderTitle("404");
            $this->renderContent("<div class='page-header'><h1>404, page not found!</h1></div>");
            return;
        }

        if (Rays::app()->isDebug())
            print $e;
        else
            $this->renderContent($e->getCode() . '<br/>' . $e->getMessage());
    }
}