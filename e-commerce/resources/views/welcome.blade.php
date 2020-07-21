@extends('layout')

@section('title', 'Home')

@section('content')

<span class="first-section">Brash Fashion</span>

<div class="second-section">
    <img src="/img/girlNeon.jpg" alt="refresh" class="girlNeon"/>
</div>

<span class="third-section" data-content="Summer">Summer</span>

<div class="description-section" id="about">
    <img src="/img/LogoBrash.png" alt="reload" class="logoAbout"/>
    <div class="aboutUs">
        We are a family of brands, driven by our desire to make great
        design available to everyone in a sustainable way. Together we
        offer fashion, design and services, that enable people to be inspired
        and to express their own personal style, making it easier to live
        in a more circular way.
    </div>
</div>

<div class="type-section male">
    <img src="/img/mariano.png" alt="reload" class="type-photo"/>
    <span class="title-type-man-section">MAN</span>
    <div class="briefMan">
        Here there are most cool dress for man subscribe into our site!
    </div>
    <button class="btn login">LOG IN</button>
    <button class="btn subscribe">SUBSCRIBE</button>
</div>

<div class="type-section female">
    <img src="/img/ragazza.png" alt="reload" class="type-girl-photo"/>
    <span class="title-type-man-section">WOMAN</span>
    <div class="briefWoman">
        Here there are most cool dress for woman subscribe into our site!
    </div>
    <button class="btn login">LOG IN</button>
    <button class="btn subscribe">SUBSCRIBE</button>
</div>

<div class="type-section baby">
    <img src="/img/Baby.png" alt="reload" class="type-baby-photo"/>
    <span class="title-type-man-section">BABY</span>
    <div class="briefBaby">
        Here there are most cool dress for boy and girl subscribe into our site!
    </div>
    <button class="btn login">LOG IN</button>
    <button class="btn subscribe">SUBSCRIBE</button>
</div>

<form method="POST" action="{{ url('/users/store') }}" class="subscribe-form" id="contact">
    @csrf
    <h1 style="text-align:center; margin-top:40px;">SUBSCRIBE TO OUR SITE!</h1>
    <input type="text" name="name" placeholder="Name" class="input-form"/>
    <input type="text" name="surname" placeholder="Surname" class="input-form"/>
    <input type="text" name="email" placeholder="Email" class="input-form"/>
    <input type="text" name="address" placeholder="Address" class="input-form"/>
    <input type="password" name="password" placeholder="Password" class="input-form"/>
    <button type="submit" class="submit">SUBSCRIBE</button>
</form>

<footer class="awards">
    <section class="container logoCentered">
        <img src="/img/LogoBrash.png" alt="reload" class="logoBFooter">
        <span class="lineRight"></span>   
        
        <div class="footer-navbar-shop">
            <ul>
                <li style="margin-bottom: 10px; font-size:25px">SHOP</li>
                <li>Woman</li>
                <li>Man</li>
                <li>Baby</li>
                <li>BRASH HOME</li>
            </ul>
        </div>

        <div class="footer-navbar-corporate">
            <ul>
                <li style="margin-bottom: 10px; font-size:25px">CORPORATE INFO</li>
                <li>Career at BRASH</li>
                <li>About BRASH</li>
                <li>Inverstor Relations</li>
            </ul>
        </div>

        <div class="footer-navbar-help">
            <ul>
                <li style="margin-bottom: 10px; font-size:25px">HELP</li>
                <li>Customer Service</li>
                <li>My Account</li>
                <li>Contact</li>
                <li>Gift Card</li>
                <li>Find a Store</li>
            </ul>
        </div>


    </section>
</footer>

@endsection