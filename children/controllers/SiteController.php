<?php

namespace app\controllers;

use app\models\Afisha;
use app\models\Category;
use app\models\Circle;
use app\models\Comment;
use app\models\Post;
use app\models\Proposal;
use app\models\RegisterForm;
use app\models\Timelist;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->is_admin)
            {
                return $this->redirect(['/admin']);
            } else {
                return $this->redirect(['site/kabinet']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->redirect(['site/index']);
        }

        $model->password = '';
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/index']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $query = Circle::find()->orderBy('date asc');
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(), 'pageSize'=>6]);
        $circle = $query->offset($pages->offset)->limit($pages->limit)->all();
        $categories = Category::find()->all();
        $time = Timelist::find()->all();
        //$goodstatus = Circle::find()->where(['status'=>2])->limit(6)->all();

        return $this->render('about', ['categories'=>$categories, 'circle'=>$circle, 'time'=>$time, 'pages'=>$pages]);
    }

    public function actionCircle()
    {
        $id = Yii::$app->request->get('id');
        $circle = Circle::findOne($id);

        $model = new Comment();
        $comments = Comment::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('comment', 'Коммент у модератора');
            return $this->refresh();
        }
        $context = ['circle' => $circle, 'comments' => $comments, '$model' => $model];

        return $this->render('circle', $context);
    }

    public function actionMycategory()
    {
        if (isset($_GET['id']) && $_GET['id']!='')
        {
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $circle = Circle::find()->where(['category_id'=>$_GET['id']])->asArray()->all();
            return $this->render('mycategory', compact('categories', 'circle'));
        }
        else
            return $this->redirect(['mycategory']);
    }

    public function actionProposal()
    {
        $model = new Proposal();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Отправлено');

            return $this->refresh();
        }
        return $this->render('proposal', [
            'model' => $model,
        ]);
    }

    public function actionKabinet()
    {
        $userId = Yii::$app->user->id;
        $proposal = Proposal::find()->where(['user_id' => $userId])->all();

        return $this->render('kabinet', ['proposal' => $proposal]);
    }



//    public function actionComment($id)
//    {
//        $comments = Comment::find()->where(['circle_id' => $id])->all();
//        return $this->render('comments', ['comments' => $comments]);
//    }
}


