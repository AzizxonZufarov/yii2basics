<?php


namespace app\controllers;
use Yii;
use app\models\RecordModel;
use yii\db\StaleObjectException;

class RecordController extends AppController
{
    public function actionUpdate($id=1)
    {
        $model = RecordModel::findOne($id);
        //debug($model);die();
        try {

            if ($model->load(Yii::$app->request->post()) ) {
                $model->text = Yii::$app->request->post('RecordModel')['text'];
                $model->version = Yii::$app->request->post('RecordModel')['version'];
                if($model->save()) {
                    Yii::$app->session->setFlash('success', 'Success');
                    return $this->refresh();
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }catch (StaleObjectException $e) {
                $model = RecordModel::findOne($model->id);
                Yii::$app->session->setFlash('error', 'Conflict, 
                item was changed by another user, your changes will be lost. [Edit again] [Cancel]');
                return $this->render('update', [
                    'model' => $model,
                ]);
        }
//        $model = RecordModel::find()->where(['id' => $id])->one();
//        //debug($model);die();
//
//        try {
//            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//                Yii::$app->session->setFlash('success', 'Удача');
//                return $this->refresh();
//            } else {
//                return $this->render('update', [
//                    'model' => $model,
//                ]);
//            }
//        } catch (StaleObjectException $e) {
//            Yii::$app->session->setFlash('error', 'Ошибка');
//        }
    }
}