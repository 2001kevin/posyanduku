<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Menarra Finance Dashboard Page" />
  <link rel="icon" href="{{ asset('assets/images/LOGO.svg') }}">
  <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Chart JS" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Cevin Wahyu" />

  <title>Posyanduku</title>

  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

  <!-- External CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css" media="screen" />

  {{-- CDN Datatable --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap5.min.css">
  <!-- CDN Fontawesome -->
  <script src="https://kit.fontawesome.com/32f82e1dca.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Nav Sidebar -->
  <nav class="sidebar offcanvas-md offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="d-flex justify-content-end m-3 d-block d-md-none">
      <button aria-label="Close" data-bs-dismiss="offcanvas" data-bs-target=".sidebar" class="btn p-0 border-0 fs-4">
        <i class="fas fa-close"></i>
      </button>
    </div>
    <div class="d-flex justify-content-center mt-md-5 mb-5">
      <img src="assets/images/LOGO_POSYANDU.svg" alt="Logo" width="140px" height="40px" />
    </div>
    <div class="pt-2 d-flex flex-column gap-5">
      <div class="menu p-0">
        <p>Data Posyandu</p>
        <a href="{{ route('dataAbsensiKader') }}" class="item-menu active">
          <i class="icon ic-stats"></i>
          Absensi Kader
        </a>
        <a href="{{ route('dataKader') }}" class="item-menu">
          <i class="icon ic-stats"></i>
          Kader
        </a>
        <a href="{{ route('dataAnak') }}" class="item-menu">
          <i class="icon ic-account"></i>
          Data Anak
        </a>
        <a href="{{ route('dataWali') }}" class="item-menu">
          <i class="icon ic-account"></i>
          Data Wali
        </a>
        <a href="#" class="item-menu">
          <i class="icon ic-trans"></i>
          Data Suplemen
        </a>
        <a href="#" class="item-menu">
          <i class="icon ic-trans"></i>
          Data fisik
        </a>
      </div>
      <div class="menu">
        <p>Others</p>
        <a href="#" class="item-menu">
          <i class="icon ic-settings"></i>
          Settings
        </a>
        <a href="#" class="item-menu">
          <i class="icon ic-help"></i>
          Help
        </a>
        <form method="POST" action="{{ route('logout') }}">
          <a :href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();" class="item-menu">
            @csrf
            <i class="icon ic-logout"></i>
            Logout
          </a>
        </form>

        <!-- <div>
            <input id="checkbox" type="checkbox" class="toggle-theme" aria-label="Toggle Theme" />
            <label for="checkbox" class="label-toggle">
              <img src="./assets/images/ic_moon.svg" width="50%" class="ic-theme" id="ic-dark" alt="Icon Dark" />
              <img src="./assets/images/ic_sun.svg" width="50%" class="ic-theme" id="ic-light" alt="Icon Light" />
            </label>
          </div> -->

      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="content">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <div>
          <button class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block" aria-label="Hamburger Button">
            <i class="fa-solid fa-bars"></i>
          </button>
          <button data-bs-toggle="offcanvas" data-bs-target=".sidebar" aria-controls="sidebar" aria-label="Hamburger Button" class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none">
            <i class="fa-solid fa-bars"></i>
          </button>
        </div>
        <div class="d-flex align-items-center justify-content-end gap-4">
          <input type="text" placeholder="Search report or product" class="search form-control" />
          <button class="btn btn-search d-flex justify-content-center align-items-center p-0" type="button">
            <img src="assets/images/ic_search.svg" width="20px" height="20px" />
          </button>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <img src="assets/images/avatar.jpg" alt="Photo Profile" class="avatar" :href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();" />
          </form>
          <div style="width: 62px;">{{ Auth::user()->name }}</div>

        </div>
      </div>
    </nav>
    @yield('content')
  </main>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script src="{{ asset('assets/js/donut_chart.js') }}"></script>
  <script src="{{ asset('assets/js/line_chart.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.sidebarCollapseDefault').on('click', function() {
        $('.sidebar').toggleClass('active');
        $('.content').toggleClass('active');
      });
    });
  </script>
</body>

</html>
