<?php
/**
 * SiteController
 *
 * @author: Raysmond
 * @created: 2013-12-19
 */

class SiteController extends RController
{
    // public $defaultAction = "index";
    // public $layout = "index";

    public function actionIndex()
    {
        $this->render("index", array());
    }

    public function actionAbout()
    {
        $this->render("about");
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

    /**
     * Exception handling
     * @param Exception $e
     */
    public function actionException(Exception $e)
    {
        if ($e instanceof RPageNotFoundException || $e->getCode() === 404) {
            $this->setHeaderTitle("404");
            $this->renderContent("<h1>404, page not found!</h1>");
            return;
        }

        if (Rays::app()->isDebug())
            print $e;
        else
            $this->renderContent($e->getCode() . '<br/>' . $e->getMessage());
    }
}