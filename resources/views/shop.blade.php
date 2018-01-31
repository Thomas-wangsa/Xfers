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
                <h3> Balance : {{number_format($balance,2)}}</h3>
            </div>

            <div style="clear: both;"> </div>
            

            <div class="row">
                <form method="POST" action="{{url('/buy')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="ammount" value="20000">
                    <input type="hidden" name="item" value="kindle">

                    <div class="col-md-6">
                      <div class="thumbnail">
                          <img id="kindle" src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/dp/2017/820610209344910/kv_comp-chart_180x120._CB514442764_.png" alt="Lights" style="width:100%">
                          <div class="caption">
                            <p> Kindle (20.000) </p>
                          </div>
                        <button type="submit" id="kindle_submit" class="btn btn-primary">Buy</button>
                      </div>
                    </div>
                </form>

                <form method="POST" action="{{url('/buy')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="ammount" value="100000">
                    <input type="hidden" name="item" value="mac">

                    <div class="col-md-6">
                      <div class="thumbnail">
                          <img src="https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/m/ac/macbook/select/macbook-select-space-gray-201706?wid=452&hei=420&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=1505775431709" alt="Nature" style="width:100%">
                          <div class="caption">
                            <p> Macbook (100.000)</p>
                            <button type="submit" id="mac_submit" class="btn btn-primary">Buy</button>
                          </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
