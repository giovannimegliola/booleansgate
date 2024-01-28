@extends('layouts.app')
@section('content')
    <main id="home">
        <section class="container">
            
            <div>
                <img src="{{asset('storage/images/Ronaldo da Fiano Romano.gif')}}" class="my-obg" data-value="-2" alt="">
                <img src="{{asset('storage/images/Lamberto Lasagna.gif')}}" class="my-obg" data-value="6" alt="">
                <img src="{{asset('storage/images/Orazio Grinzosi.gif')}}" class="my-obg" data-value="4" alt="">
                <img src="{{asset('storage/images/Pietro Smusi.gif')}}" class="my-obg" data-value="-6" alt="">
                <img src="{{asset('storage/images/Alfonso Torrone.gif')}}" class="my-obg" data-value="8" alt="">
            </div>
            <h1 class="my-obg" data-value="3">
                BooleansGate
            </h1>
            <div>
                <img src="{{asset('storage/img/Shortbow.gif')}}" class="my-obg" data-value="-4" alt="">
                <img src="{{asset('storage/img/Net.gif')}}" class="my-obg" data-value="5" alt="">
                <img src="{{asset('storage/img/Handaxe.gif')}}" class="my-obg" data-value="-9" alt="">
                <img src="{{asset('storage/img/Sling.gif')}}" class="my-obg" data-value="-5" alt="">
            </div>
        </section>
    </main>
@endsection
