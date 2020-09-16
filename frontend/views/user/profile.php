<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Profile';
?>


<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-push-3 ">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Saved!</h4>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>


            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Error!</h4>
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <h1><?= Html::encode($this->title) . ' ' ?><small style="font-size: 20px"> only you and train administrator
                    can see your profile. </small></h1>
            <hr class="colorgraph">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="box box-info">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'form-id']]); ?>
                        <div class="box-body">
                            <div class="col-sm-6">
                                <div align="center"><img alt="User Pic"
                                        <?php if (!$model->image_id) { ?>
                                                         src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                                         id="profile-image1" class="img-circle">
                                    <?php } else {
                                        echo Html::img(Url::to(['/image/open', 'id' => $model->image->id]), ['id' => 'profile-image1', 'class' => 'img-circle img-responsive']);
                                    }
                                    ?>

                                    <?= $form->field($model, 'imageFile', ['inputOptions' => ['']])->fileInput(['id' => 'profile-image-upload', 'class' => 'hidden'])->label(false) ?>
                                    <div id="profile-image">click here to change profile image</div>

                                    <!--Upload Image Js And Css-->

                                </div>

                                <br>

                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:black; text-transform: capitalize "><?= $model->firstname . ' ' . $model->lastname ?> </h4></span>
                                <?php if (($model->discount) && ($model->discount !== 'waiting')) { ?>
                                    <span><p>You are: <?= $model->discount ?></p></span>
                                <?php } else if ($model->discount == 'waiting') { ?>
                                    <span style="color: #00b1b1"><p>Your request is being processed.</p></span>
                                <?php } else { ?>
                                    <span><p><?= Html::a('I want discount.', ['user/discount'], ['class' => '']) ?></p></span>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">


                            <div class="col-sm-5 col-xs-6 tital ">First Name:</div>
                            <div class="col-sm-7 col-xs-6"
                                 style="text-transform: capitalize"><?= $model->firstname ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Last Name:</div>
                            <div class="col-sm-7" style="text-transform: capitalize"><?= $model->lastname ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <div class="col-sm-5 col-xs-6 tital ">Email:</div>
                            <div class="col-sm-7"><?= $model->email; ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <div class="col-sm-5 col-xs-6 tital ">Phone:</div>
                            <div class="col-sm-7"><?= $model->phone; ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital"><?= Html::button('Change Password', [
                                    'class' => 'btn',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#your-modal',
                                ]) ?>

                                <?php Modal::begin([
                                    'header' => '<h2>Change Password</h2>',
                                    'id' => 'your-modal',

                                ]);

                                ActiveForm::begin();
                                echo $form->field($model, 'newPassword', ['inputOptions' => ['placeholder' => 'New Password', 'class' => 'form-control input-lg']])->passwordInput(['required' => true, 'maxlength' => 15, 'minlength' => '6'])->label(false);
                                echo $form->field($model, 'confirmNewPassword', ['inputOptions' => ['placeholder' => 'Confirm New Password', 'class' => 'form-control input-lg']])->passwordInput(['required' => true])->label(false);
                                echo Html::submitButton('Update', ['class' => 'btn btn-success btn-block btn-lg']);

                                ActiveForm::end();

                                Modal::end();
                                ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="colorgraph">

            <?php $form = ActiveForm::end(); ?>

        </div>
        <script>
            $(function () {
                $('#profile-image').on('click', function () {
                    $('#profile-image-upload').click();
                });
            });

            document.getElementById("profile-image-upload").onchange = function () {
                document.getElementById("form-id").submit();
            };
        </script>
    </div>
</div>




