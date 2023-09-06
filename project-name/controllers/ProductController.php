<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category; // Adjust the namespace as per your project structure
use yii\web\Response;

class ProductController extends Controller
{
    // ...

   public function actionCreate(){
    $model = new Product();
    $categories = Category::find()->all(); // Fetch all categories

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // Save the product to the database
        $model->save();
        Yii::$app->session->setFlash('success', 'Product created successfully.');
        return $this->redirect(['index']); // Redirect to the product list page
    }

    return $this->render('create', [
        'model' => $model,
        'categories' => $categories, // Pass categories to the view
    ]);
}
    // ...
}

