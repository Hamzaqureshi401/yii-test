<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category; // Adjust the namespace as per your project structure
use yii\web\Response;

class CategoryController extends Controller
{
    // ...

    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Category created successfully.');
            return $this->redirect(['create']);// Redirect to the category list page
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // ...
}

