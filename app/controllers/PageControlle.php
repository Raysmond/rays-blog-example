<?php
/**
 * PageController
 *
 * @author: Raysmond
 * @creatd: 2014-01-01
 */

class PageController extends RController
{
    public $access = array(User::ADMIN => array("new", "edit", "admin"));

    public function actionNew()
    {
        $this->render("new");
    }

    public function actionEdit($pid)
    {
        $page = Page::get($pid);
        RAssert::not_null($page);

        $this->render("edit", array("page", $page));
    }

    public function actionAdmin()
    {
        $page = Rays::getParam("page", 1);
        $pageSize = Rays::getParam("pagesize", 10);

        $count = Page::find()->count();
        $pages = Page::find()->order_asc("id")->range(($page - 1) * $pageSize, $pageSize);

        $pager = new RPager("page", $count, $pageSize, RHtml::siteUrl("page/admin"), $page);
        $data = array(
            'count' => $count,
            'pages' => $pages,
            'pager' => $pager->showPager()
        );

        $this->setHeaderTitle("Pages administration");
        $this->render($data);
    }
} 