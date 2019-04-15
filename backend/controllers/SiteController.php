<?php
namespace backend\controllers;

use common\models\Contact;
use common\models\Product;
use common\models\User;
use frontend\modules\blog\models\Articles;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        $last_message = Contact::find()->orderBy(['date' => SORT_DESC])->limit(1)->asArray()->one();
        $last_product = Product::find()->orderBy(['date_upload' => SORT_DESC])->limit(1)->asArray()->one();
        $last_blog = Articles::find()->orderBy(['created_at' => SORT_DESC])->limit(1)->asArray()->one();

        return $this->render('index',['last_mes' => $last_message,'item' => $last_product,'blog' => $last_blog]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $admin_checking = User::find()->where(['username' => $model['username']])->andWhere(['is_admin' => 1])->asArray()->one();
            if (!empty($admin_checking)){
                return $this->goBack();
            }else{
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
