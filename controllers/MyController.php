<?php

namespace app\controllers;


class MyController extends AppController
{

    public function actionIndex($id=null)
    {
        $hi = 'hello';
        $names = ['ivanov','petrov','sidorov'];
        if (!$id) $id="1";
        return $this->render('index', ['hi'=>$hi, 'names'=>$names, 'id'=>$id]);
        //return $this->render('index', compact('hi', 'names', 'id'));
    }

    public function actionBlogPost()
    {
        return 'blog-post';
    }

}
