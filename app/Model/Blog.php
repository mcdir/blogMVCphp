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

    /**
     * @param int $limit
     * @param int|false $offset
     * @return object|\stdClass
     */
    public function getPostsLimited($limit, $offset = false)
    {
        $limit = $limit
            ? intval($limit, 10)
            : false;
        if ($limit) {
            $offset = $offset
                ? intval($offset, 10)
                : false;

            return $this->_dbh->query(
                'SELECT `id_post`, `post_title`, `post_content`, `post_created`
                FROM posts
                ORDER BY post_created DESC
                LIMIT ' . ($offset ? $offset . ',' . $limit : $limit)
            )->fetchAll(\PDO::FETCH_CLASS);
        } else {
            return new \stdClass();
        }
    }

    /**
     * @param int $next_id
     * @param int|false $id_current
     * @return object
     */
    public function getNextPosts($next_id, $id_current = false)
    {
        $sth = $this->_dbh->prepare(
            'SELECT `id_post`, `post_title`, `post_content`, `post_created`
            FROM `posts`
            WHERE  `id_post`=:id_post
            ' . ($next_id ? '  OR  `id_post` <> :id_current AND ' : ' OR ') . '
              `post_created`<=
              (
                SELECT `post_created`
                FROM `posts`
                WHERE `id_post`=:id_post
              )
            ORDER BY `post_created` DESC
            LIMIT 2'
        );
        $sth->bindValue(':id_post', $next_id, \PDO::PARAM_INT);
        if ($next_id) {
            $sth->bindValue(':id_current', $id_current, \PDO::PARAM_INT);
        }
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_CLASS);
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

    /**
     * @param $params
     */
    public function updatePostById($params)
    {
        $id_post = isset($params['id_post'])
            ? $params['id_post']
            : false;
        unset($params['id_post']);

        $fields = array(
            'post_title' => '`post_title`=:post_title',
            'post_content' => '`post_content`=:post_content',
            'post_created' => '`post_created`=:post_created'
        );

        $isset_fields = array_intersect_key($fields, $params);
        if ($id_post && $isset_fields) {

            $sth = $this->_dbh->prepare(
                'UPDATE  posts
                SET ' . implode(',', $isset_fields) . '
                WHERE id_post = :id_post'
            );
            if (isset($params['post_title'])) {
                $sth->bindValue(
                    ':post_title',
                    $params['post_title'],
                    \PDO::PARAM_STR
                );
            }
            if (isset($params['post_content'])) {
                $sth->bindValue(
                    ':post_content',
                    $params['post_content'],
                    \PDO::PARAM_STR
                );
            }
            if (isset($params['post_created'])) {
                $sth->bindValue(
                    ':post_created',
                    date('Y-m-d', strtotime($params['post_created'])),
                    \PDO::PARAM_STR
                );
            }

            $sth->bindValue(':id_post', $id_post, \PDO::PARAM_STR);
            $sth->execute();
        }
    }

    public function insertNewPost($params)
    {
        $sth = $this->_dbh->prepare(
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
        $post_created = (isset($params['post_created']))
            ? date('Y-m-d', strtotime($params['post_created']))
            : '';
        $sth->bindValue(
            ':post_created',
            $post_created,
            \PDO::PARAM_STR
        );

        return $sth->execute();
    }

}