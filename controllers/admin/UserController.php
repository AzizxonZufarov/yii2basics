<?php

namespace app\controllers\admin;

use app\controllers\AppController;


class UserController extends AppController
{

    public function actionIndex($id=null)
    {
        $hi = 'admin';
        return $this->render('index', ['hi'=>$hi]);
    }

}
