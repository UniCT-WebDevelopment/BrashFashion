<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Page - Invoice N.{{$order->id}}</title>

    <!-- Iconpage -->
    <link rel="icon" href="/img/BLogo.png">

    <!-- Style -->
    <link href="/css/style-users.css" rel="stylesheet">
    <link href="/css/grid.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="invoice">
            <h1>INVOICE N.{{$order->id}}</h1>
            <table class="buyedTable">
                <tr>
                    <td>Product Code</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
                @foreach ($order_detail as $item)
                    <tr>
                        <td>{{$item->cod_product}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}€</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color:rgb(95, 255, 95);">TOTAL=></td>
                    <td style="color:rgb(95, 255, 95);">{{$order->amount}}€</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- JQuery -->
    <script src="/plugins/jquery/jquery-3.5.0.min.js"></script>

    <!-- Javascript -->
    <script src="/js/userEffect.js"></script>

</body>
</html>