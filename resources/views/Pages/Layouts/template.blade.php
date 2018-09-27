<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF-token initialization --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>   
        
        {{-- Laravel App.CSS --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- Jquery CDN --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        {{-- w-3 Stylesheet --}}
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        {{-- Google Fonts --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css" />

        {{-- Font Awesome Stylesheet and JS --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
       
        {{-- material design light (mdl) CDN --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script> --}}
                
        <style>
            
            .w3-allerta {
                font-family: "Allerta Stencil", Sans-serif;
            }

           .ai-osfont{
                font-family: 'Open Sans', 'Helvetica', arial, serif;
            }

            .ai-nav:hover {
                color: black;
                background: tomato;
                padding: 8px;
                
            }
                
        </style>

        @yield('head')

        <title>@yield('title')</title>    

    </head>

    <body>

        <div class="row">
            {{-- This is the header --}}
            @include('Pages.Layouts.header')
        </div>

        

        {{-- Body --}}
        @yield('body')

        

        {{-- Script for VUE components --}}
        <script src="{{asset('js/app.js')}}"></script>

        @yield('jquery')
            
    </body>
</html>
