<?php


namespace app\controllers;


use app\models\Task;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TasksController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $query = Task::find()
            ->joinWith('parent')
            ->andWhere(['task.user_id' => Yii::$app->user->getId()]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $items = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }


    public function actionAdd()
    {
        $entity = new Task();
        $entity->user_id = Yii::$app->user->getId();

        if ($entity->load(Yii::$app->request->post()) && $entity->validate()) {
            $entity->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('add', [
                'entity' => $entity,
                'tasks' => Task::forCurrentUser()
            ]);
        }
    }

    public function actionEdit($id)
    {
        $entity = Task::find()
            ->where(['id' => $id])
            ->one();
        if ($entity === null) {
            throw new NotFoundHttpException();
        }

        if ($entity->load(Yii::$app->request->post()) && $entity->validate()) {
            $entity->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'entity' => $entity,
                'tasks' => Task::forCurrentUser()
            ]);
        }

    }
}