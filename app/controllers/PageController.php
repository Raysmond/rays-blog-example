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
        $this->render("index", array('pages' => Page::find("typeId", Type::TYPE_PAGE)->where("[status]=?", Page::STATUS_PUBLISHED)->order_desc("id")->all()));
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
                if (($id = $page->save()) !== false) {
                    if (($alias = $this->processPageUrl($id)) !== null) {
                        $this->redirect(RHtml::siteUrl($alias->aliasUrl));
                    }
                    $this->redirectAction("page", "view", $id);
                } else
                    $this->flash("error", "Unexpected error!");
            } else
                $data['errors'] = $page->getErrors();
        }
        $this->render("new", $data);
    }

    public function actionView($pid)
    {
        Counter::increaseCounter(Page::TYPE_PAGE, $pid);
        $cache = new RCacheFile(Rays::app()->getConfig("cache"));
        if (!Rays::isLogin() && ($content = $cache->get("page.pages", "p$pid")) !== false) {
            $this->renderContent($content);
        } else {
            $page = Page::get($pid);
            RAssert::not_null($page);
            $page->parseContent();

            $content = $this->renderPartial("view", array('page' => $page), true);
            if (!Rays::isLogin())
                $cache->set("page.pages", "p$pid", $content);
            $this->renderContent($content);
        }
    }

    private function processPageUrl($pid)
    {
        $urlAlias = Rays::getParam("custom_url_alias", null);
        $source = "page/view/{$pid}";
        if (($urlAlias = trim($urlAlias))) {
            $check = UrlAlias::find("aliasUrl", $urlAlias)->first();
            if ($check !== null && $check->source !== $source) {
                $urlAlias .= "-" . date("Y-m-d-H-i-s");
            }

            $alias = UrlAlias::find("source", $source)->first();
            if ($alias === null)
                $alias = new UrlAlias(array('source' => $source, "aliasUrl" => $urlAlias));
            else
                $alias->aliasUrl = $urlAlias;
            if ($alias->validate_save() !== false)
                return $alias;
        } else {
            UrlAlias::where("[source]=?", array($source))->delete();
        }
        return null;
    }

    public function actionEdit($pid)
    {
        $page = Page::get($pid);
        RAssert::not_null($page);

        if (Rays::isPost()) {
            $page1 = Page::get($pid);
            $page1->set($_POST);
            $page1->updateTime = date('Y-m-d H:i:s');
            if ($page1->save() !== false) {
                if (($alias = $this->processPageUrl($page1->id)) !== null) {
                    $this->redirect(RHtml::siteUrl($alias->aliasUrl));
                }
                $this->redirectAction("page", "view", $page->id);
            } else {
                $this->render("edit", array('page' => $page, 'form' => $_POST, 'errors' => $page1->getErrors()));
            }
        }

        $this->render("edit", array("page" => $page, "uri" => UrlAlias::find("source", "page/view/{$page->id}")->first()));
    }

    public function actionAdmin()
    {
        $page = Rays::getParam("page", 1);
        $pageSize = Rays::getParam("pagesize", 10);

        $count = Page::find("typeId", Type::TYPE_PAGE)->count();
        $pages = Page::find("typeId", Type::TYPE_PAGE)->order_asc("id")->range(($page - 1) * $pageSize, $pageSize);

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