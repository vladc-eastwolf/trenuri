<?php

use  yii\helpers\Html;

$this->title = 'Tickets Available';
?>

<title>HTML to API - event tickets</title>
<link href='https://fonts.googleapis.com/css?family=Lobster|Kreon:400,700' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" href="styles/main.css" media="screen" charset="utf-8"/> -->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="content-type" content="text-html; charset=utf-8">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 style="color: #00b1b1"><?= Html::encode($this->title) . " " ?></h1>
            <hr class="colorgraph">
            <section>

                <div class="special"><span style="float: left;"><span style="font-size: 15px;color: #00b1b1">From: </span><span style="color: black"><?=$ticket->departureStation->name ?></span></span></div>
                <div class="special"><span style="float: left; font-size: 15px;" ><span style="color: #00b1b1">Name: </span><span style="color: black"><?=$ticket->name ?></span></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>
                <div class="special"></div>


            </section>

            <aside>
                <figure>
                    <img src="" alt="">
                </figure>
            </aside>
        </div>
    </div>
</div>


<style>
    body {
        margin: 0;
        color: #e6e6e6;



    }

    section {
        width: 375px;
        border: 1px solid #d9d9d9;
    }

    section .special {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        height: 35px;
        background-color: #e6e6e6;
        color: #fff;

    }

    section .special:nth-child(2n+1) {
        background-color: #f2f2f2;
    }

    section .special:nth-child(6), section .special:nth-child(7) {
        z-index: 1;
    }


</style>