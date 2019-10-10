<?php

namespace app\controllers;

use app\forms\ChangeStateForm;
use app\forms\GetUserForm;
use app\forms\SearchForm;
use app\models\User;
use app\repository\UserRepository;
use Yii;
use yii\base\Exception;
use yii\base\Module;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class UserController extends Controller
{
    public $userRepository;

    public function __construct($id, Module $module, $config = [], UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        parent::__construct($id, $module, $config);
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * Create action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new User();
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {
            try {
                $id = $this->userRepository->create($post);
                return $this->render('create', [
                    'model'    => $model,
                    'id'       => $id,
                    'isCreate' => false
                ]);
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        }

        return $this->render('create', [
            'model'    => $model,
            'isCreate' => true
        ]);
    }

    /**
     * Get user by id
     *
     * @return Response|string
     */
    public function actionFind()
    {
        $model = new GetUserForm();
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            try {
                $user = $this->userRepository->getUserById($post['GetUserForm']['id']);

                return $this->render('userInfo', [
                    'user' => $user,
                ]);
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        }

        return $this->render('getById', [
            'model' => $model,
        ]);
    }

    /**
     * Get user by name
     *
     * @return Response|string
     */
    public function actionGet()
    {
        $model = new GetUserForm();
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            try {
                $user = $this->userRepository->getUserByName($post['GetUserForm']['name']);

                return $this->render('userInfo', [
                    'user' => $user,
                ]);
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        }

        return $this->render('getByName', [
            'model' => $model,
        ]);
    }

    /**
     * Update user
     *
     * @param $id integer
     *
     * @return Response|string
     */
    public function actionUpdate($id)
    {
        $model = new User();
        $post = Yii::$app->request->post();
        $user = User::getUser($id);
        
        if ($model->load($post) && $model->validate()) {
            try {
                $user = $this->userRepository->updateUser($post, $id);
                Yii::$app->session->setFlash('success', 'Данные успешно обновлены.');
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        }

        return $this->render('update', [
            'isUpdate' => true,
            'user'     => $user,
            'model'    => $model,
        ]);
    }

    /**
     * List og all users
     *
     * @return Response|string
     */
    public function actionList()
    {
        $model = new User();
        $dataProvider = new ActiveDataProvider([
            'query' => $this->userRepository->getAll(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list', [
            'model'        => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Change state
     *
     * @return Response|string
     */
    public function actionChange()
    {
        $model = new ChangeStateForm();
        $post = Yii::$app->request->post();

        $users = User::getUsers();
        $ids = ArrayHelper::map($users, 'id', 'id');

        if ($model->load($post)) {
            try {
                $user = $this->userRepository->changeState($post);
                Yii::$app->session->setFlash('success', 'Данные успешно обновлены.');
                return $this->render('changeState', [
                    'ids'           => $ids,
                    'model'         => $model,
                    'isResponse'    => true,
                    'user'          => $user
                ]);
            } catch (Exception $ex) {
                Yii::$app->session->setFlash('error', $ex);
            }
        }

        return $this->render('changeState', [
            'ids'       => $ids,
            'model'     => $model,
        ]);
    }
}
