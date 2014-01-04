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
//        $cache = new RCacheFile(Rays::app()->getConfig("cache"));
//        if (($content = $cache->get("page", "index")) !== false) {
//            $this->renderContent($content);
//            return;
//        }
        $config = Configuration::getConfiguration();
        $id = $config->getConfig("front_page_intro_id");
        $intro = $id !== null ? Post::get($id) : null;
        if (null !== $intro && $intro->contentType === Post::TYPE_MARKDOWN) {
            $intro->parseContent();
        }
        $content = $this->renderPartial("index", array("intro" => $intro), true);
//        $cache->set("page", "index", $content);
        $this->renderContent($content);
    }

    public function actionAbout()
    {
//        $cache = new RCacheFile(Rays::app()->getConfig("cache"));
//        if (($content = $cache->get("page", "about")) !== false) {
//            $this->renderContent($content);
//            return;
//        }
        $config = Configuration::getConfiguration();
        $id = $config->getConfig("about_page_id");
        $page = $id !== null ? Post::get($id) : null;
        if (null !== $page && $page->contentType === Post::TYPE_MARKDOWN) {
            $page->parseContent();
        }
        $content = $this->renderPartial("about", array("page" => $page), true);
//        $cache->set("page", "about", $content);
        $this->renderContent($content);
    }

    public function actionContact()
    {
        if (Rays::isPost()) {
            // do some thing

            $this->flash("message", "Thanks for your contact!");
        }
        $this->setHeaderTitle("Contact");
        $this->render("contact");
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

    public function actionProjects()
    {
//        $cache = new RCacheFile(Rays::app()->getConfig("cache"));
//        if (($content = $cache->get("page", "project")) !== false) {
//            $this->renderContent($content);
//            return;
//        }
        $config = Configuration::getConfiguration();
        $id = $config->getConfig("project_page_id");
        $page = $id !== null ? Post::get($id) : null;
        if ($page !== null && $page->contentType === Post::TYPE_MARKDOWN) {
            $page->parseContent();
        }
        $content = $this->renderPartial("projects", array("page" => $page), true);
//        $cache->set("page", "project", $content);
        $this->renderContent($content);
    }

    /**
     * Exception handling
     * @param Exception $e
     */
    public function actionException(Exception $e)
    {
        if ($e instanceof RPageNotFoundException || $e->getCode() === 404) {
            // TODO load routing at initialization
            $config = Configuration::getConfiguration();
            $routes = $config->getConfig("custom_routing");
            if ($routes !== null) {
                $routes = explode("\n", $routes);
                foreach ($routes as $route) {
                    if (($pos = strpos($route, "=")) !== false) {
                        $uri = trim(substr($route, 0, $pos));
                        $routingUri = trim(substr($route, $pos + 1));
                        if ($uri === Rays::uri()) {
                            $router = new RRouter();
                            Rays::app()->runController($router->getRouteUrl($routingUri));
                            exit;
                        }
                    }
                }
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