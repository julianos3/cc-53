@extends('site.layouts.site')

@section('content')
    <div class="def-100 m-top-100">
        <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Funcionalidades</b>
            </span>
        </div>
    </div>
    <div class="def-100 m-top-30">
        <div class="def-center">
            <h1 class="def-100 f-w-600 color-grey f-size-24">FUNCIONALIDADES</h1>
        </div>
    </div>
    <div class="def-100 p-top-40 p-bottom-180 bx-image-city p-top-1024-30 p-bottom-1024-30">
        <div class="def-center">
            <nav class="def-100 list-group-functions">
                <ul class="def-100 w-1024-102 w-600-100">
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-left'">
                            <figure class="def-100 t-align-c">
                                <img class="max-w-100" src="{{ asset('upload/funcionalidades/2d3b9345e6dbf99d236ca01eddb0bb09.png') }}" alt="" title="" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c t-upper f-w-600 color-grey f-size-18">
                                titulo
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>texto aqui</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection