<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

  <title>Aplikasi Penelitian BALITTRA</title>

  <!-- vendor css -->
  <link href="{{asset('admin/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <!-- Databale -->
  <link href="{{asset('admin/lib/typicons.font/typicons.css')}}" rel="stylesheet">
  <link href="{{asset('admin/lib/prismjs/themes/prism-vs.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.dashboard.css')}}">
  <link id="dfMode" rel="stylesheet" href="{{asset('admin/assets/css/skin.cool.css')}}">
  <link id="dfSkin" rel="stylesheet" href="{{asset('admin/assets/css/skin.deepblue.css')}}">
  @stack('styles')

</head>

<body class="page-profile">

  <aside class="aside aside-fixed">
    <div class="aside-header">
      <a href="{{Route('index')}}" class="aside-logo">BALITTRA </span></a>
      <a href="" class="aside-menu-link">
        <i data-feather="menu"></i>
        <i data-feather="x"></i>
      </a>
    </div>
    <div class="aside-body">
      <div class="aside-loggedin">
        <div class="d-flex align-items-center justify-content-start">
        <a href="" class="avatar"><img src="{{asset('images/user/'. Auth::user()->foto)}}" class="rounded-circle" alt=""></a>
          <div class="aside-alert-link">
          <a class="nav-link" data-toggle="tooltip" title="Sign out" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
            data-feather="log-out"></i> </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
          @if(Auth::user()->status == 1)
            @if(Auth::user()->peneliti->penelitian->count() == 0)
            <li class="nav-item"><a href="#" class="nav-link"><i data-feather="info"></i> <span>Data Penelitian <br>Belum diinput</span></a></li>
            @else
              <li class="nav-label mg-t-25">Akun</li>
              <li class="nav-item"><a href="{{Route('penelitiProfil')}}" class="nav-link"><i data-feather="user"></i>
                  <span>Profil</span></a></li>
              <li class="nav-label mg-t-25">Penelitian</li>
              <li class="nav-item"><a class="nav-link" href="{{Route('penelitiPembimbingIndex')}}"><i
                    data-feather="user"></i>Pembimbing</a></li>
              <li class="nav-item"><a href="{{Route('penelitiPenelitianIndex')}}" class="nav-link"><i
                    data-feather="sunrise"></i> <span>Data Penelitian</span></a></li>
              <li class="nav-item"><a href="{{Route('penelitiLaporanPenelitian')}}" class="nav-link"><i
                    data-feather="file-text"></i> <span>Laporan Penelitian</span></a></li>
              <li class="nav-label mg-t-25">Lain lain</li>
              <li class="nav-item"><a href="{{Route('penelitiPeminjamanIndex')}}" class="nav-link"><i
                    data-feather="box"></i> <span>Peminjaman Fasilitas</span></a></li>
            @endif
          @else
          <li class="nav-label mg-t-25"></li>
          <li class="nav-item"><a href="#" class="nav-link"><i data-feather="info"></i> <span>Akun Anda Belum Aktif <br>
            Menunggu verifikasi admin</span></a></li>
          @endif
        </ul>
      </div>
  </aside>

  <div class="content ht-100v pd-0">
    <div class="content-header">
    Aplikasi Pelayanan Kegiatan Penelitian pada Balai Penelitian Pertanian Lahan Rawa (BALITTRA)
      <nav class="nav">
        @guest
        <a class="nav-link" href="{{ route('login') }}"><i data-feather="log-in"></i>{{ __('Login') }}</a>
        @else
        <a class="nav-link" data-toggle="tooltip" title="Sign out" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
            data-feather="log-out"></i>
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @endguest
      </nav>
    </div><!-- content-header -->
    @yield('content')
  </div>
  @include('sweetalert::alert')
  <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
  <script src="{{asset('admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/lib/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/lib/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('admin/lib/jquery.flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('admin/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('admin/lib/chart.js/Chart.bundle.min.js')}}"></script>

  <script src="{{asset('admin/assets/js/dashforge.js')}}"></script>
  <script src="{{asset('admin/assets/js/dashforge.aside.js')}}"></script>
  <script src="{{asset('admin/assets/js/dashforge.sampledata.js')}}"></script>

  <!-- append theme customizer -->
  <script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
  <!-- Databale -->
  <script src="{{asset('admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

  @yield('scripts')
  <script>
    $(function(){

        $.plot('#flotChart2', [{
          data: [[0,55],[1,38],[2,20],[3,70],[4,50],[5,15],[6,30],[7,50],[8,40],[9,55],[10,60],[11,40],[12,32],[13,17],[14,28],[15,36],[16,53],[17,66],[18,58],[19,46]],
          color: '#69b2f8'
        },{
          data: [[0,80],[1,80],[2,80],[3,80],[4,80],[5,80],[6,80],[7,80],[8,80],[9,80],[10,80],[11,80],[12,80],[13,80],[14,80],[15,80],[16,80],[17,80],[18,80],[19,80]],
          color: '#f0f1f5'
        }], {
          series: {
            stack: 0,
            bars: {
              show: true,
              lineWidth: 0,
              barWidth: .5,
              fill: 1
            }
          },
          grid: {
            borderWidth: 0,
            borderColor: '#edeff6'
          },
          yaxis: {
            show: false,
            max: 80
          },
          xaxis: {
            ticks:[[0,'Jan'],[4,'Feb'],[8,'Mar'],[12,'Apr'],[16,'May'],[19,'Jun']],
            color: '#fff',
          }
        });

      })
  </script>
</body>

</html>