<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Page</title>

    <!-- Iconpage -->
    <link rel="icon" href="/img/BLogo.png">

    <!-- Style -->
    <link href="/css/style-staff.css" rel="stylesheet">
    <link href="/css/grid.css" rel="stylesheet">
</head>
<body>
    <div class="returnHome">
        <a href={{ url('/main/logout') }}>LOGOUT</a>
    </div>

    <div class="container">

        <h2>Benvenuto, {{$staff->name}} {{$staff->surname}}</h2>
        <div class="manage">
            Manage order status
            <table class="ordersTable">
                <tr>
                    <td>Order code</td>
                    <td>Status order</td>
                </tr>

                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                @foreach($orders as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>
                            @if($item->status_order == 0)
                                <img src="/img/SwitchOFF.png" name ="{{$item->id}}" class="SwitchOFF" style="width:40px;"/>
                                <img src="/img/SwitchON.png" name="{{$item->id}}" class="SwitchON" style="width:40px; display:none;"/>
                            @else
                                <img src="/img/SwitchON.png" name="{{$item->id}}" class="SwitchON" style="width:40px;"/>
                                <img src="/img/SwitchOFF.png" name ="{{$item->id}}" class="SwitchOFF" style="width:40px; display:none;"/>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>

        <div class="assignment">
            Insert new product
            <form method="GET" action="{{ url('/product/store') }}" class="insert-form">
                <input type="text" name="name" placeholder="product name" class="input-form"/>
                <input type="text" name="description" placeholder="insert little description" class="input-form"/>
                <input type="text" name="price" placeholder="insert the price" class="input-form"/>
                <input type="text" name="quantity" placeholder="insert the quantity of the product" class="input-form"/>
                <input type="text" name="gender" placeholder="insert the gender" class="input-form"/>
                <input type="hidden" name="cod" value="{{$staff->id}}"/>
                
                <button type="submit" class="submit">INSERT</button>
                <button type="reset" class="submit" style="margin-left: 15px">RESET</button>
            </form>
        </div>

        {{--<div class="removeItem">
            Remove Item
            <form method="POST" action="/product/destroy" class="remove-form">
                @csrf
                <input type="hidden" name="id_staff" value="{{$staff->id}}"/>
                <input type="text" name="item_name" placeholder="Insert item name"/>
                <button type="submit" class="remove-item">REMOVE</button>
            </form>
        </div>--}}

        <div class="products">

            @foreach ($product as $pr)
            <div class="card">
                <div class="caption">
                    <img src="/img/LogoBrash.png"/>
                </div>
                <div class="descriptionCard">
                    <ul>
                        <li><span>Name:</span> {{ $pr->name }}</li>
                        <li><span>Description:</span> {{ $pr->description }}</li>
                        <li><span>Price:</span> {{ $pr->price }}€</li>
                        <li><span>Quantity:</span> {{ $pr->quantity }}</li>
                        <li><span>Gender:</span> {{ $pr->gender }}</li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- JQuery -->
    <script src="/plugins/jquery/jquery-3.5.0.min.js"></script>

    <!-- Javascript -->
    <script src="/js/staffEffect.js"></script>
</body>
</html>