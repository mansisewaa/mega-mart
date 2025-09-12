<!DOCTYPE html>
<html lang="en">

<head>
    <title>AUIDFC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="  ">
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('frontend/lightbox2/dist/css/lightbox.min.css')}}">

    <style>
        body {
            text-align: justify;
        }
    </style>
</head>


@php
$menus = App\Models\Menu::where('status',1)->get();
@endphp

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#084c9d;">
        <div class="container menus">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">HOME</a>
                    </li>
                    @foreach ($menus as $menu)
                    @if($menu->sublink != 1)
                    @if($menu->slug == 'products')
                    <a class="nav-link active" href="{{route('products')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-transform:uppercase;margin-left:.3rem;">
                        PRODUCTS
                    </a>

                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('page',$menu->slug)}}" style="text-transform:uppercase;margin-left:.3rem;">{{$menu->name}}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">

                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-transform:uppercase;margin-left:.3rem;">
                            {{$menu->name}}
                        </a>




                        <!-- @php
                            $submenus = App\Models\SubMenu::where('menu_id', $menu->id)->get();
                            @endphp
                            <ul class="dropdown-menu" style="background-color:#4e93e4;">
                                @foreach ($submenus as $submenu)
                                <li><a class="dropdown-item" href="{{route('submenu', [$menu->slug, $submenu->slug])}}" style="color:white;">{{$submenu->name}}</a></li>
                                @endforeach
                            </ul>
                        </li> -->
                        @endif
                        @endforeach
                </ul>
                <a href="/contact_us" class="btn custom-btn1" style="font-size:14px; color:black;">CONTACT US</a>
            </div>
        </div>
    </nav>
