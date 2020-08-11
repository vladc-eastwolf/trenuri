<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

use yii\helpers\Html;

$this->title = 'Check-Out';

?>
<div style="text-align: center">
    <h1><?= $this->title ?><small style="font-size: 20px"> please complete all the following fields:</small></h1>
</div>
<hr class="colorgraph" style="width: 1168px;">

<div class="row">

    <div class="container">
        <div class="col-75">

            <?php $form = \yii\widgets\ActiveForm::begin() ?>
            <?php if (Yii::$app->user->isGuest) { ?>
            <div class="row">
                <div class="col-50">
                    <h3>Personal Data</h3>

                    <?= $form->field($model, 'name', ['inputOptions' => ['placeholder' => 'Full Name', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true])->label(false) ?>

                    <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'ex:someone@something.com', 'class' => 'form-control input-lg']])->label(false) ?>

                </div>
                <?php } ?>
                <div class="col-50">
                    <h3>Payment</h3>
                    <label for="fname">Accepted Cards</label>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <label for="cname">Name on Card</label>

                    <?= $form->field($model, 'test1', ['inputOptions' => ['placeholder' => 'ex: John More Doe', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true])->label(false) ?>

                    <label for="ccnum">Credit card number</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="September">

                    <div class="row">
                        <div class="col-50">
                            <label for="expyear">Exp Year</label>
                            <input type="text" id="expyear" name="expyear" placeholder="2018">
                        </div>
                        <div class="col-50">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="352">
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
<hr class="colorgraph" style="width: 1168px;">
<div class="form-group">
    <div class="col-lg-3" style="position: fixed;bottom: 225px; left: 360px">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
    </div>
</div>

<?php $form = \yii\widgets\ActiveForm::end() ?>
<style>
    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
</style>