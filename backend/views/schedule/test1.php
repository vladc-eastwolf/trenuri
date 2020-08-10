<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form=ActiveForm::begin(); ?>
<?= $form->field($model,'test')->textInput() ?>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php $form=ActiveForm::end(); ?>
