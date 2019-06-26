<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';

class WrongHeader extends Exception
{
}

class PageNotFound extends Exception
{
}

class Router
{
    public $page;

    public function __construct($name)
    {
        $this->page = $name;
    }

    public function checkPageName()
    {

        if (!array_key_exists('page', $_GET)) {
            throw new WrongHeader('Get request error');
        }

        if (!array_key_exists($_GET['page'],$availableLinks)) {
            throw new PageNotFound('Page is not exist');
        }

        return true;
    }
}

$page = new Router($availableLinks);
try {
    $page->checkPageName();
    echo "Вы находитесь на странице ['$_GET']";

} catch (WrongHeader $e) {
    header('Location: error.php', 400);
} catch (PageNotFound $e) {
    header('Location: 404.php', 404);
}