<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

?>

<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-push-3 ">
            <hr class="colorgraph">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>User Profile</h2></div>
                <div class="panel-body">

                    <div class="box box-info">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                        <div class="box-body">
                            <div class="col-sm-6">
                                <div align="center"><img alt="User Pic"
                                                         <?php if(!$model->image_id) { ?>
                                                             src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle">
                                                        <?php }else {
                                                           echo Html::img(Url::to(['/image/open', 'id' => $model->image->id]),['id'=>'profile-image1','class'=>'img-circle img-responsive']);
                                                         }
                                                        ?>

                                    <?= $form->field($model, 'imageFile',['inputOptions'=>['']])->fileInput(['id'=>'profile-image-upload'])->label(false) ?>

                                    <!--Upload Image Js And Css-->

                                </div>

                                <br>

                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1; text-transform: capitalize "><?= $model->firstname . ' ' . $model->lastname ?> </h4></span>
                                <span><p>Student</p></span>
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">



                            <div class="col-sm-5 col-xs-6 tital ">First Name:</div>
                            <div class="col-sm-7 col-xs-6  "><?= $form->field($model, 'firstname')->textInput(['maxlength' => true,'style' => 'text-transform:capitalize'])->label(false); ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Last Name:</div>
                            <div class="col-sm-7"><?= $form->field($model, 'lastname')->textInput(['maxlength' => true,'style' => 'text-transform:capitalize'])->label(false); ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <div class="col-sm-5 col-xs-6 tital ">Email:</div>
                            <div class="col-sm-7"><?= $model->email . " "; ?><a
                                        href="<?= Url::to(['/user/request-email-reset']) ?>"
                                        class="glyphicon glyphicon-pencil"></a></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <div class="col-sm-5 col-xs-6 tital ">Phone:</div>
                            <div class="col-sm-7"><?= $model->phone; ?></div>

                        </div>
                    </div>
                </div>
            </div>
            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-6">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-success btn-block btn-lg']) ?>
                </div>
                <?php $form = ActiveForm::end(); ?>
                <div class="col-xs-12 col-md-6">
                    <?= Html::button('Change Password', [
                        'class' => 'btn btn-primary btn-block btn-lg',
                        'data-toggle' => 'modal',
                        'data-target' => '#your-modal',
                    ]) ?>

                    <?php Modal::begin([
                        'header' => '<h2>Change Password</h2>',
                        'id' => 'your-modal',

                    ]);

                    ActiveForm::begin();
                    echo $form->field($model, 'oldPassword', ['inputOptions' => ['placeholder' => 'Old Password', 'class' => 'form-control input-lg']])->passwordInput(['autofocus' => true,'required'=>true])->label(false);
                    echo $form->field($model, 'newPassword', ['inputOptions' => ['placeholder' => 'New Password', 'class' => 'form-control input-lg']])->passwordInput(['required'=>true,'maxlength'=>15,'minlength'=>'6'])->label(false);
                    echo $form->field($model, 'confirmNewPassword', ['inputOptions' => ['placeholder' => 'New Password', 'class' => 'form-control input-lg']])->passwordInput(['required'=>true])->label(false);
                    echo Html::submitButton('Update', ['class' => 'btn btn-success btn-block btn-lg']);

                    ActiveForm::end();

                    Modal::end();
                    ?>
                </div>
            </div>



        </div>
        <script>
            $(function () {
                $('#profile-image1').on('click', function () {
                    $('#profile-image-upload').click();
                });
            });
        </script>
    </div>
</div>




