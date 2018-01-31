<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Welcome Xfers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bold p {font-weight:bold}
        </style>
    </head>
    <body>
        <div class="container text-center">
            <h1> Shop Xfers! </h1>
            <div class="pull-left">
                <h3>
                <a href="{{url('/')}}"> 
                    HomePage
                </a> 
                </h3>
            </div>
            <div class="pull-right">
                <h3> Balance :  
                    <?php 
                        $result =  $data["transaction"] ? $data["new_balance"] : $data["old_balance"];
                        echo number_format($result,2);
                    ?>
                </h3>
            </div>

            <div style="clear: both;"> </div>
            

            <div class="row">
                <h1>
                    <?php
                    echo $data["transaction"] 
                    ? "Purchased ".$data['item']."!" 
                    : "Your balance is not enough to buy ".$data['item']."!"; 
                    ?> 
                </h1>
            </div>
        </div>
    </body>
</html>
