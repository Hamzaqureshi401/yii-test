<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category; // Adjust the namespace as per your project structure
use app\models\Product; // Adjust the namespace as per your project structure

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
        return $this->redirect(['create']); // Redirect to the product list page
    }

    return $this->render('_form', [
        'model' => $model,
        'categories' => $categories, // Pass categories to the view
    ]);
}
    // ...
}

