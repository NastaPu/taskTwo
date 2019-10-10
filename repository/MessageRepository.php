<?php

namespace app\repository;

use app\models\Message;
use yii\base\Exception;

class MessageRepository
{
    /**
     * Create message
     *
     * @param  $post array
     *
     * @throws Exception
     */
    public function create(array $post)
    {
        $user = new Message();
        $user->user_id = $post['Message']['user_id'];
        $user->contact_id = $post['Message']['contact_id'];
        $user->send_time = date('Y-m-d H:i:s',time());
        $user->delivery_time = date('Y-m-d H:i:s',time());
        $user->content = $post['Message']['content'];

        if(!$user->save()) {
            throw new Exception('Ошибка при попытке сохранения в базу данных.');
        }
    }

}
