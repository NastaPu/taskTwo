<?php

namespace app\controllers;

use app\forms\UserMessageForm;
use app\models\Message;
use app\models\MessageSearch;
use app\models\User;
use app\repository\MessageRepository;
use app\repository\UserRepository;
use yii\base\Exception;
use Yii;
use yii\base\Module;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class MessageController extends Controller
{
    public $messageRepository;
    public $userRepository;

    public function __construct($id, Module $module, $config = [], MessageRepository $messageRepository, UserRepository $userRepository)
    {
        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;

        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Create message.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new Message();
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            try {
                $this->messageRepository->create($post);
                Yii::$app->session->setFlash('success', 'Сообщение успешно отправлено!');
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $this->getUserList()
        ]);
    }

    /**
     * Get message by user ID
     *
     * @return Response|string
     */
    public function actionList()
    {
        $searchModel = new MessageSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * Get user map (id => username)
     *
     * @return array
     */
    private  function getUserList()
    {
        $users = User::getUsers();
        $users = ArrayHelper::map($users, 'id', 'username');
        
        return $users;
    }
}
