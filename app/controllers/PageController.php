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

    public function actionIndex()
    {
        $this->render("index", array('pages' => Page::find()->where("[status]=?", Page::STATUS_PUBLISHED)->order_desc("id")->all()));
    }

    public function actionNew()
    {
        $data = array();
        if (Rays::isPost()) {
            $data = array('form' => $_POST);
            $page = new Page($_POST);
            $page->updateTime = $page->createTime = date("Y-m-d H:i:s");
            $page->uid = Rays::user()->id;
            $page->status = Page::STATUS_PUBLISHED;
            // use markdown syntax
            $page->contentType = Page::TYPE_MARKDOWN;
            if ($page->validate("new")) {
                if (($id = $page->save()) !== false)
                    $this->redirectAction("page", "view", $id);
                else
                    $this->flash("error", "Unexpected error!");
            } else
                $data['errors'] = $page->getErrors();
        }
        $this->render("new", $data);
    }

    public function actionView($pid)
    {
        $page = Page::get($pid);
        RAssert::not_null($page);

        $this->render("view", array('page' => $page));
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