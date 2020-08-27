<div class="row" style="padding-left: 100px; padding-top: 30px">
    <div class="col-xs-9 col-md-7" style="border: 2px solid black;">

        <div style="padding-left:5px; padding-top: 5px">
            <span style="font-size: 15px;color: #00b1b1">From: </span>
            <span style="color: black"><?= $ticket->departureStation->name . ' | ' ?></span>
            <span style="font-size: 15px;color: #00b1b1">At: </span>
            <span style="color: black"><?= $ticket->departure_time ?></span>

        </div>
        <div style="padding-left:5px;">
            <span style="font-size: 15px;color: #00b1b1">From: </span>
            <span style="color: black"><?= $ticket->arrivalStation->name . ' | ' ?></span>
            <span style="font-size: 15px;color: #00b1b1">At: </span>
            <span style="color: black"><?= $ticket->arrival_time ?></span>

        </div>
        <div style="padding-left:5px;">
            <span style="font-size: 15px;color: #00b1b1">Date: </span>
            <span style="color: black"><?= $ticket->journey_date ?></span>
        </div>
        <hr>
        <div style="padding-left:5px;">
            <span style="font-size: 15px;color: #00b1b1">Sale Time: </span>
            <span style="color: black"><?= $ticket->sales_time ?></span>

        </div>
        <div style="padding-left: 5px">
            <span style="color: #00b1b1; font-size: 15px;">Distance: </span>
            <span style="color: black"><?= $ticket->distance . 'KM' ?></span>
        </div>
        <div style="padding-left:5px;">
            <span style="font-size: 15px;color: #00b1b1">Seat: </span>
            <span style="color: black"><?= $ticket->seat_reserved ?></span>
        </div>
        <div style="padding-left: 5px">
            <span style="font-size: 15px;color: #00b1b1">Train: </span>
            <span style="color: black"><?= $ticket->composition->train->type . $ticket->composition->train->number ?></span>
        </div>

        <hr>

        <div style="padding-left: 5px">
            <span style="color: #00b1b1; font-size: 15px;">Name: </span>
            <span style="color: black"><?= $ticket->name ?></span>
        </div>
        <div style="padding-left: 5px">
            <span style="color: #00b1b1; font-size: 15px;">Email: </span>
            <span style="color: black"><?= $ticket->email ?></span>
        </div>
        <div style="padding-left: 5px">
            <span style="color: #00b1b1; font-size: 15px;">******* Price: </span>
            <span style="color: black"><?= $ticket->price . 'Lei' ?></span>
        </div>

    </div>
</div>
<aside>
    <figure>
        <img src="" alt="">
    </figure>
</aside>


