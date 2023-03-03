<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use function Symfony\Component\String\title;
use app\models\TestForm;

class PostController extends AppController
{
    //public $layout = 'main';
    public function actionIndex()
    {

        //$names = ['ivanov','petrov','sidorov'];

        //update
//        $post = TestForm::findOne(1);
//    $post->email = "4@4.ru";
//    $post->save();

        //delete
        //$post = TestForm::findOne(7);
       // $post -> delete();
        TestForm::deleteAll(['>', 'id', 3]);

//insert
        $model = new TestForm();
//        $model->name = 'Автор';
//        $model->email = '1@1.ru';
//        $model->text = 'text4';
        //$model->save();
        //$this->debug($names);

        //создание
        if($model->load(Yii::$app->request->post()))
        {
            //debug(Yii::$app->request->post());die();
            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Удача');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        return $this->render('index', ['model' => $model]);
    }


    public function actionTest($id=null)
    {
        $this->layout = 'main';


        $this->view->title = 'Все статьи';
        if(Yii::$app->request->isAjax) {
            debug($_GET);
            Yii::$app->request->get();
            return 'test';
        }
        $model = new TestForm();

        if($model->load(Yii::$app->request->post()))
        {
            //debug(Yii::$app->request->post());die();
            if ($model->validate())
            {
                Yii::$app->session->setFlash('success', 'Удача');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        return $this->render('test', compact('model'));
    }
    public function actionShow($id=null)
    {
        $this->layout = 'main';
        //$this->view->title = 'SHow';
//выборка - read
        //$cats = Category::find()->all();
        //$cats = Category::find()->orderBy(['title' => SORT_DESC])->all();
        //$cats = Category::find()->asArray()->all();
        //$cats = Category::find()->where('parent=1')->all();
        //$cats = Category::find()->where(['like', 'title', '3'])->all();
        //$cats = Category::find()->where(['<=', 'id', 2])->all();
        //$cats = Category::find()->asArray()->limit(3)->all();
        //$cats = Category::find()->where(['like', 'title', 'Блог'])->count();
        //$cats = Category::findOne(['parent'=>1]);
        //$cats = Category::findAll(['parent'=>1]);

//        $query = "SELECT *FROM categories WHERE title LIKE '%лог%'";
//        $cats = Category::findBySql($query)->all();

//        $query = "SELECT *FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($query, [':search' => '%лог%'])->all();
        //$cats = Category::findOne(1);
        $cats = Category::find()->all();//отложенная загрузка плохо
        $cats = Category::find()->with('products')->all();//жадная загрузка -хорошо
        return $this->render('show', ['cats' => $cats]);
    }

}
