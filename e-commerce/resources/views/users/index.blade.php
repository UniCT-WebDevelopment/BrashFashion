<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>

    <!-- Iconpage -->
    <link rel="icon" href="/img/BLogo.png">

    <!-- Style -->
    <link href="/css/style-users.css" rel="stylesheet">
    <link href="/css/grid.css" rel="stylesheet">
</head>
<body>
    <div class="returnHome">
        <a href={{ url('/main/logout') }}>LOGOUT</a>
    </div>

    <div class="container">

        <h2>Benvenuto, {{$users->name}} {{$users->surname}}</h2>
        <div class="products">
            <div class="searchBar">
                <img src="/img/search.png"/>
                <input type="text" class="searchProduct" placeholder="Search by product name"/>
            </div>

            @foreach ($product as $pr)
            <div class="card">
                <div class="caption">
                    <img src="/img/LogoBrash.png"/>
                </div>
                <div class="descriptionCard">
                    <ul>
                        <li><span class="title">Name:</span> <span class="name-pr" data={{$pr->id}}> {{ $pr->name }} </span></li>
                        <li><span class="title">Description:</span> {{ $pr->description }}</li>
                        <li><span class="title">Price:</span> <span class="price-pr"> {{ $pr->price }}</span>€</li>
                        @if($pr->quantity != 0)
                            <li><span class="title">Quantity:</span> <span class="quantity-pr" name="{{ $pr->quantity }}"> {{ $pr->quantity }} </span></li>
                        @else
                            <li><span class="title">Quantity:</span> <span class="quantity-pr" name="FINISHED"  style="color:red;">FINISHED</span></li>
                        @endif
                        <li><span class="title">Gender:</span> {{ $pr->gender }}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        <div class="basket">
            Current Basket
            <table class="ordersTable">
                <tr>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
            </table>
            <form method="POST" action="/orders/store" class="counted">
                @csrf
                <input type="hidden" name="cod_user" value="{{$users->id}}"/>
                <button type="submit" class="pay">PAYMENT</button>
            </form>
 
            <button type="submit" class="delete">DELETE ALL</button>
        </div>

        <div class="orders">
            Orders executed
            <table class="ordersExecuted">
                <tr>
                    <td>Order Code</td>
                    <td>Status Order</td>
                    <td>Invoice Download</td>
                    <td>Remove Order</td>
                </tr>

                @foreach($orders as $item)
                    <tr>
                    @if($item->cod_user == $users->id)
                        <td>{{$item->id}}</td>
                        @if($item->status_order == 0)
                            <td style="color:red;">WAIT FOR APPROVAL</td>
                            <td style="color:red;">NO</td>
                            <td><img src="/img/remove.png" class="removeOrder" name="{{$item->id}}"/></td>
                        @else
                            <td style="color:green">ACCEPTED</td>
                            <td><a href="/users/showInvoice/{{$item->id}}" target="_blank" class="invoiceDownload">DOWNLOAD IT</a></td>
                            <td><img src="/img/ok.png" class="acceptOrder" name="{{$item->id}}"></td>
                        @endif
                    @endif
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

    <!-- JQuery -->
    <script src="/plugins/jquery/jquery-3.5.0.min.js"></script>

    <!-- Javascript -->
    <script src="/js/userEffect.js"></script>

</body>
</html>