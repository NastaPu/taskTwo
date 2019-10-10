<?php

namespace app\repository;

use app\models\User;
use yii\base\Exception;

class UserRepository
{
    /**
     * Create user
     *
     * @param  $post array
     * 
     * @throws Exception
     * @return integer
     */
    public function create(array $post)
    {
        $user = new User();
        $user->username = $post['User']['username'];
        $user->password = password_hash($post['User']['password'], PASSWORD_DEFAULT);
        $user->state = $post['User']['state'];

        if(!$user->save()) {
            throw new Exception('Ошибка при попытке сохранения в базу данных.');
        }
        
        return $user->id;
    }

    /**
     * Find user by ID
     *
     * @param  $id integer
     *
     * @throws Exception
     * @return User
     */
    public function getUserById($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        if(!$user) {
            throw new Exception('Пользователь с данным id не найден.');
        }
        
        return $user;
    }

    /**
     * Find user by name
     *
     * @param  $username string
     *
     * @throws Exception
     * @return User
     */
    public function getUserByName($username)
    {
        $user = User::find()->where(['username' => $username])->one();
        if(!$user) {
            throw new Exception('Пользователь с данным username не найден.');
        }

        return $user;
    }

    /**
     * Get all users
     *
     * @return array
     */
    public function getAll()
    {
        return User::find();
    }

    /**
     * Update  user
     * 
     * @param $post array
     * @param $id integer
     *
     * @throws Exception
     * @return User
     */
    public function updateUser(array $post, $id)
    {
        $user = User::find()->where(['id' => $id])->one();
        if($user) {
            $user->username = $post['User']['username'];
            $user->password = password_hash($post['User']['password'], PASSWORD_DEFAULT);;
            $user->state = $post['User']['state'];
            if(!$user->save()) {
                throw new Exception('Ошибка при попытке сохранения в базу данных.');
            }
            return $user;
        } else {
            throw new Exception('Пользователь с данным ID yне найден');
        }
    }

    /**
     * Change state
     *
     * @param $post array
     *
     * @throws Exception
     * @return User
     */
    public function changeState(array $post)
    {
        $user = User::find()->where(['id' => $post['ChangeStateForm']['id']])->one();
        if($user) {
            $user->state = $post['ChangeStateForm']['state'];
            if(!$user->save()) {
                throw new Exception('Ошибка при попытке сохранения в базу данных.');
            }
            return $user;
        } else {
            throw new Exception('Пользователь с данным ID yне найден');
        }
    }
}
