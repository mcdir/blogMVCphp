<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Model\Blog as Blog;
use \Core\Database as Database;


class BlogModelTest extends PHPUnit_Framework_TestCase
{
    protected $blog_model;

    protected function setUp()
    {
        $this->blog_model = new Blog(Database::getInstance());
        $this->assertInstanceOf('PDO', Database::getInstance());
    }

    public function testGetAllPosts()
    {
        $this->assertObjectHasAttribute('id_post', $this->blog_model->getAllPosts());
    }

    public function testGetPostsLimitedBase()
    {
        $tmp = $this->blog_model->getPostsLimited(1);
        $this->assertObjectHasAttribute('id_post', $tmp[0]);
    }

    public function testGetPostsLimitedStep()
    {
        $this->assertCount(2, (array)$this->blog_model->getPostsLimited(2, 1));
    }

    public function testGetPostById()
    {
        $this->assertCount(1, (array)$this->blog_model->getPostById(1));
    }

    // @todo and so on
//    public function testUpdatePostById()
//    {
//        $this->assertCount(1, (array) $this->blog_model->updatePostById(1));
//    }

    /**
     * @dataProvider InsertNewPost
     */
//    public function testInsertNewPost()
//    {
//        $this->assertCount(1, (array) $this->blog_model->insertNewPost(1));
//    }

    protected function tearDown()
    {
    }
}
