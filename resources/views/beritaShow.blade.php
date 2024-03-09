@extends('layouts.depan')

@section('content')
<section id="cta2" style="padding:30px !important;">
    <div class="container m-0">
            <img class="img-responsive wow fadeIn" src="{{asset('images/berita/'. $data->foto)}}" alt=""
                data-wow-duration="300ms" data-wow-delay="300ms" height="70%">
                <br>
    </div>
</section>
<section class="">
    <div class="container" style="padding-left:20px;padding-right:20px;">
        <div class="">
            <h2 class="text-left">{{$data->judul}}</h2>
            <p>{{carbon\carbon::parse($data->created_at)->translatedFormat('d F Y')}}</p>
            <br>
            {!! $data->isi !!}
           
        </div>
    </div>
</section>
<br><br>
@endsection