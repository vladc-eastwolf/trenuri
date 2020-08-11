<title>HTML to API - event tickets</title>
<link href='https://fonts.googleapis.com/css?family=Lobster|Kreon:400,700' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" href="styles/main.css" media="screen" charset="utf-8"/> -->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="content-type" content="text-html; charset=utf-8">


<div class="container">
    <section>
        <div class="circle">
            <div class="event">live in concert</div>
            <div class="title">Joe Doe</div>
        </div>
        <div class="special">Test</div>
        <div class="special"></div>
        <div class="special"></div>
        <div class="special">
            <div class="seats">
                <span class="label">section</span><span>A</span>
            </div>
        </div>
        <div class="special">
            <div class="seats">
                <span class="label">row</span><span>13</span>
            </div>
            SATURDAY, AUGUST 25 2020
        </div>
        <div class="special">
            <div class="seats">
                <span class="label">seat</span><span>120</span>
            </div>
            THE PLAZA, NEW YORK
        </div>
    </section>

    <aside>
        <figure>
            <img src="" alt="">
        </figure>
    </aside>
</div>


<style>
    body {
        margin: 0;
        color: #494140;
        font-family: "Kreon", serif;
        font-weight: 400;
        font-size: 25px;
    }

    .container {
        width: 795px;
        margin: 0 auto;
    }

    section {
        position: relative;
        float: left;
        width: 685px;
    }

    section .special {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        height: 47px;
        padding: 10px 150px 0;
        background-color: #494140;
        color: #fff;
        text-align: center;
    }

    section .special:nth-child(2n+1) {
        background-color: #93ACA2;
    }

    section .special:nth-child(6), section .special:nth-child(7) {
        z-index: 1;
    }

    section .circle {
        position: absolute;
        top: 10px;
        left: 215px;
        width: 255px;
        height: 255px;
        background-color: #fff;
        border-radius: 50%;
        box-shadow: 0px 10px 4px 0px rgba(0, 0, 0, 0.5);
        text-align: center;
        line-height: 30px;
        z-index: 1;
    }

    section .circle .event {
        width: 150px;
        margin: 25px auto 25px;
        font-size: 1.12em;
        font-weight: 700;
        text-transform: uppercase;
    }

    section .circle .title {
        color: #93ACA2;
        font-family: "Lobster", cursive;
        font-size: 2.48em;
    }

    section .seats {
        position: absolute;
        top: 10px;
        left: 30px;
        color: #fff;
        font-weight: 700;
    }

    section .seats span {
        display: inline-block;
    }

    section .seats .label {
        width: 40px;
        margin-right: 20px;
        padding-top: 8px;
        font-size: 0.36em;
        font-weight: 400;
        text-align: right;
        text-transform: uppercase;
        vertical-align: top;
    }

    aside {
        float: right;
        width: 110px;
    }

    aside figure {
        height: 100%;
        margin: 0;
        text-align: center;
    }

    aside figure img {
        margin-top: 25px;
    }
</style>