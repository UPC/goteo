<?php


namespace Goteo\Controller\Admin\Tests;

use Goteo\Controller\Admin\TagsSubController;
use Goteo\Model\User;
use Symfony\Component\HttpFoundation\Request;

class TagsSubControllerTest extends \PHPUnit_Framework_TestCase {

    public function testInstance() {
        $user = new User();
        $node = 'test';
        $request = Request::create();

        $controller = new TagsSubController($node, $user, $request);

        $this->assertInstanceOf('\Goteo\Controller\Admin\TagsSubController', $controller);

        return $controller;
    }
}
