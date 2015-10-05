<?php

namespace Model;

use \Core\Model as Model;

class Blog extends Model
{

    public function getAllPosts()
    {
        return $this->_dbh->query(
            'SELECT `id_post`, `post_title`, `post_content`, `post_created`
            FROM posts
            ORDER BY post_created DESC'
        )->fetchObject();
    }

    public function getPostsLimited($limit, $start = false)
    {
        $limit = $limit
            ? intval($limit, 10)
            : false;
        if ($limit) {
            $start = $start
                ? intval($start, 10)
                : false;
            $sql_limit = $start
                ? $start . ',' . $limit
                : $limit;

            return $this->_dbh->query(
                'SELECT `id_post`, `post_title`, `post_content`, `post_created`
                FROM posts
                ORDER BY post_created DESC
                LIMIT ' . $sql_limit
            )->fetchAll(\PDO::FETCH_CLASS);
        } else {
            return new \stdClass();
        }
    }

    public function getPostById($id)
    {
        $sth = $this->_dbh->prepare(
            'SELECT `id_post`, `post_title`, `post_content`, `post_created`
            FROM posts
            WHERE id_post = :id_post'
        );
        $sth->bindValue(':id_post', $id, \PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_CLASS);
    }

    public function updatePostById($params)
    {
        if (!isset($params['id']))
        {
            return null;
        }
        $sth = $this->_dbh->prepare(
            'UPDATE  posts
            SET `post_title`=:post_title, `post_content`=:post_content, `post_created`=:post_created
            WHERE id_post = :id_post'
        );
        $sth->bindValue(
            ':post_title',
            (isset($params['post_title']) ? $params['post_title'] : ''),
            \PDO::PARAM_STR
        );
        $sth->bindValue(
            ':post_content',
            (isset($params['post_content']) ? $params['post_content'] : ''),
            \PDO::PARAM_STR
        );
        $sth->bindValue(
            ':post_created',
            (isset($params['post_created']) ? $params['post_created'] : ''),
            \PDO::PARAM_STR
        );
        $sth->bindValue(':id_post', $params['id'], \PDO::PARAM_STR);

        return $sth->execute();
    }
    public function updatePostTitleById($id, $post_title)
    {
        $sth = $this->_dbh->prepare(
            'UPDATE  posts
            SET `post_title`=:post_title
            WHERE id_post = :id_post'
        );
        $sth->bindValue(':post_title', $post_title, \PDO::PARAM_STR);
        $sth->bindValue(':id_post', $id, \PDO::PARAM_INT);

        return $sth->execute();
    }

    public function insertNewPost($id)
    {
        $sth = $this->_dbh->query(
            'INSERT INTO posts  (`post_title`, `post_content`, `post_created`)
            VALUES (:post_title, :post_content, :post_created)'
        );
        $sth->bindValue(
            ':post_title',
            (isset($params['post_title']) ? $params['post_title'] : ''),
            \PDO::PARAM_STR
        );
        $sth->bindValue(
            ':post_content',
            (isset($params['post_content']) ? $params['post_content'] : ''),
            \PDO::PARAM_STR
        );
        $sth->bindValue(
            ':post_created',
            (isset($params['post_created']) ? $params['post_created'] : ''),
            \PDO::PARAM_STR
        );

        return $sth->execute();
    }

}