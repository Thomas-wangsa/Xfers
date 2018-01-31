<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <h1> Welcome Xfers! </h1>
            <div class="pull-left">
                <h3>
                <a href="{{url('/shop')}}"> 
                    My online Shop
                </a> 
                </h3>
            </div>
            <div class="pull-right">
                <h3> Balance : {{number_format($balance,2)}}</h3>
            </div>

            <div style="clear: both;"> </div>
                <h5> You Have Successfully created your wallet</h5>

                <p> You can topup wallet by transfering to following bank </p>
                
            <div class="bold text-center"> 
                <p> Bank Name : {{$transfer_info['bank_name_abbreviation']}} </p>
                <p> Account Number : {{$transfer_info['bank_account_no']}}</p>
                <p> Unique ID : {{$transfer_info['unique_id']}}</p>
            </div>
        </div>
    </body>
</html>
