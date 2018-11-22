<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-category-parent_id has-success">
        <label class="control-label" for="category-parent_id">Батьківська категорія</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]">
            <option value='<?=null?>'>Самостійна категорія</option>
            <?= MenuWidget::widget(['tpl' => 'select', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'status')->dropDownList(\app\models\User::getStatuses()); ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
