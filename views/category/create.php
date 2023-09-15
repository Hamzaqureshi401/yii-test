<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
    
    'id' => 'category-form',
    
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success' , 'id' => 'submit-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#submit-button').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        
        var form = $('#category-form');

        var formData = form.serialize();
         console.log(form , formData , form.attr('action'));

        $.ajax({
            url: '/category/store',
            type: 'POST',
            data: formData,
            success: function (response) {
                // Display the response in the 'ajax-response' div
                console.log(response);
                $('#ajax-response').html(response);
                form.trigger('reset'); // Reset the form
            },
            error: function () {
                // Handle errors here
                console.log('Error submitting form via AJAX.');
            }
        });
    });
});
</script>
