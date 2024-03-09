@extends('layouts.depan')

@section('content')
<section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url({{asset('depan/images/slider/bg1.jpg')}});">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Pelayanan</span> Kegiatan Penelitian</h2>
                                    <p>Memudahkan Masyarakat dalam melakukan penelitian di Balai Penelitian Pertanian Lahan Rawa (BALITTRA) </p>
                                    <a class="btn btn-primary btn-lg" href="{{Route('permohonanInput')}}">Ajukan Permohonan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->
            <div class="item" style="background-image: url({{asset('depan/images/slider/bg2.jpg')}});">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Pelayanan</span> Kegiatan Penelitian</h2>
                                    <p>Memudahkan Masyarakat dalam melakukan penelitian di Balai Penelitian Pertanian Lahan Rawa (BALITTRA) </p>
                                    <a class="btn btn-primary btn-lg" href="{{Route('permohonanInput')}}">Ajukan Permohonan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->
        </div>
        <!--/.owl-carousel-->
    </section>
    <!--/#main-slider-->
    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Tentang Kami</h2>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Balai Penelitian Pertanian Lahan Rawa (BALITTRA)</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <img src="{{asset('depan/images/kantor.png')}}" alt="" width="100%">
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Pengertian Umum</h3>
                    <p class="text-justify"> Balai Penelitian Pertanian Lahan Rawa (BALITTRA) merupakan sebuah instansi pemerintah yang memiliki tugas pokok melaksanakan penelitian lahan rawa untuk pertanian, sebagai penyedia sarana penelitian pada pertanian dan lahan rawa ini kepada masyarakat umum yang ingin melakukan penelitian terhadap tanaman lahan rawa guna perkembangan teknologi agrikultural</p>
                    <br>
                    <a class="btn btn-primary" href="{{Route('permohonanInput')}}">Ajukan Permohonan</a>

                </div>
            </div>
        </div>
    </section>
    <!--/#about-->
    <section id="work-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Aplikasi Pelayanan Kegiatan Penelitian</h2>
                <p class="text-center wow fadeInDown">Aplikasi ini Digunakan untuk Memudahkan Masyarakat yang ingin melakukan penelitian di Balai Penelitian Pertanian Lahan Rawa.</p>
            </div>
        </div>
    </section>
    <!--/#work-process-->
    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Fungsi BALITTRA </h2>
                <p class="text-center wow fadeInDown">Adapun fungsi Balai Penelitian Pertanian Lahan Rawa (BALITTRA) secara keseluruhan adalah:</p>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                
                <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <p>Penelitian eksplorasi, karakterisasi dan konservasi ekosistem lahan rawa untuk pertanian </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight " style="margin-bottom:40px">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <p>Penelitian teknologi pengelolaan sumberdaya lahan rawa </p>
                        </div>
                    </div>
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <p>Penelitian komponen teknologi sistem dan usaha agribisnis pertanian lahan rawa </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <p>Pelayanan teknik kegiatan penelitian pertanian lahan rawa </p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight"  style="margin-bottom:40px">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <p>Penyiapan kerjasama, informasi, dokumentasi, serta penyebarluasan </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight"  style="margin-bottom:40px">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <p>Pendayagunaan hasil penelitian pertanian lahan rawa  </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight"  style="margin-bottom:40px">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <p>Pelaksanaan urusan tata usaha dan rumah tangga Balai. </p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="media-body">
                            <p>Petani yang ingin melakukan permintaan analisa terhadap unsur yang ada  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Objek Penelitian</h2>
                <p class="text-center wow fadeInDown">Fasilitas Objek Penelitian yang di sediakan pada BALITTRA</p>
            </div>

            <div class="row">
                <div class="features">
                @foreach($objekPenelitian as $o)
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$o->nama}}</h4>
                                <p class="text-justify">{{$o->uraian}}</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                @endforeach
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->

    <!-- <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/01.jpg" alt=""></p>
                                <h4>Louise S. Morgan</h4>
                                <small>Treatment, storage, and disposal (TSD) worker</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                            <div class="item">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/01.jpg" alt=""></p>
                                <h4>Louise S. Morgan</h4>
                                <small>Treatment, storage, and disposal (TSD) worker</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>

                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--/#testimonial-->
    <section id="work-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Berita Kegiatan BALITTRA</h2>
            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container">

            <div class="row">
                @foreach($berita as $b)
                <div class="col-sm-4">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                                    <img class="img-responsive" src="{{asset('images/berita/'. $b->foto)}}" alt="">
                                    <span class="post-format post-format-video"><i class="fa fa-file-text"></i></span>
                                </div>
                                <div class="entry-date">{{carbon\carbon::parse($b->created_at)->translatedFormat('d F Y')}}</div> 
                                <h2 class="entry-title"><a href="#">{{$b->judul}}</a></h2>
                            </header>

                            <div class="entry-content">
                                <a class="btn btn-primary" href="{{Route('beritaShow',['uuid'=>$b->uuid])}}">Baca Selengkapnya </a>
                            </div>
                        </article>
                        {{$berita->links()}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!--/#bottom-->
@endsection
