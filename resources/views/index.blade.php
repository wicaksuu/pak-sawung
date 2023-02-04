<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#BC8887" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Undangan Reuni SMP 1 Magetan 86</title>

    <meta property="og:title" content="Undangan Reuni SMP 1 Magetan 86">
    <meta property="og:description" content="Undangan Reuni SMP 1 Magetan 86">
    <meta property="og:locale" content="id_ID" />
    <meta property="og:image" content="https://smp1mgt86.com/smp1mgt86.com">
    <meta property="og:url" content="https://smp1mgt86.com">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bulma-tooltip@0.1.5/dist/bulma-tooltip.min.css" />
    <link rel="stylesheet" type="text/css" href="css/menikah.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.countdown.css" />
    <script
      src="https://kit.fontawesome.com/2828f7885a.js"
      integrity="sha384-WAsFbnLEQcpCk8lM1UTWesAf5rGTCvb2Y+8LvyjAAcxK1c3s5c0L+SYOgxvc6PWG"
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.coundown.js"></script>
    <link rel="icon" type="image/png" href="86.png" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23064379-20"></script>
    <!-- Begin Script for Countdown -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23064379-20');
    </script>
    <!-- Begin Script for Countdown -->

    <!-- Github Button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body>
    
    <!-- Begin Preloader -->
    <div class="preloader-wrapper">
      <div class="preloader">
        <img src="86.png" alt="Flower" />
      </div>
    </div>
    <!-- End Preloader-->
    <!-- Begin Header -->
    <div class="header-wrapper" id="home">
      <!-- Begin Hero -->
      <section class="hero is-large">
        <!-- Begin Mobile Nav -->
        <nav class="navbar is-transparent is-hidden-desktop">
          <!-- Begin Burger Menu -->
          <div class="navbar-brand is-fixed-top">
            <div class="navbar-burger burger" data-target="mobile-nav">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <!-- End Burger Menu -->
          <div id="mobile-nav" class="navbar-menu">
            <div class="navbar-end">
              <div class="navbar-item">
                <a class="navbar-item" href="#Waktu">
                  Waktu
                </a>
              </div>
              <div class="navbar-item">
                <a class="navbar-item" href="#lokasi">
                  Lokasi
                </a>
              </div>
                            <div class="navbar-item">
                <a class="navbar-item" href="#rsvp">
                  RSVP
                </a>
              </div>
            </div>
          </div>
        </nav>
        <!-- End Mobile Nav -->
        <!-- Begin Hero Content-->
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="subtitle">Undangan Reuni</h1>
            <h2 class="title">SMP 1 Magetan 86</h2>

        <audio controls autoplay>
            <source src="music.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
                <h4 class="subtitle tempatwaktu">
              
                {{ $tempatwaktu }} 
                </br>
                {{ $tempat }}
                </br>
                {{ $kota }}
              
            </h4>
          </div>
          <!-- Start Countdown -->       
          <div>
            <ul id="hitungmundur" >
              <li><span class="days">00</span><p class="days_text">Hari</p></li>
              <li class="separator">:</li>
              <li><span class="hours">00</span><p class="hours_text">Jam</p></li>
              <li class="separator">:</li>
              <li><span class="minutes">00</span><p class="minutes_text">Menit</p></li>
              <li class="separator">:</li>
              <li><span class="seconds">00</span><p class="seconds_text">Detik</p></li>
            </ul>
            <div class="spasi">
            </div>
            <script type="text/javascript">
              var now = new Date();
              var day = now.getDate();
              var month = now.getMonth() + 1;
              var year = now.getFullYear() + 1;
          
              var nextyear = month + '/' + day + '/' + year + ' 07:07:07';
              var harih = '{{ $harih }}';

              $('#hitungmundur').countdown({
                date: harih, // TODO Date format: 07/27/2017 17:00:00
                offset: +7, // TODO Your Timezone Offset
                day: 'Hari',
                days: 'Hari'
              }, function () {
                // alert('Done!');
              });
            </script>  
          </div>
          <!-- End Countdown -->
        </div>
        <!-- End Hero Content-->
        <!-- Begin Hero Menu -->
        <div class="hero-foot ">
          <div class="hero-foot--wrapper">
            <div class="columns">
              <div class="column is-12 hero-menu-desktop has-text-centered">
                <ul>
                  <li class="is-active">
                    <a href="#home">Home</a>
                  </li>
                  <li>
                    <a href="#Waktu">Waktu</a>
                  </li>
                  <li>
                    <a href="#lokasi">Lokasi</a>
                  </li>
                  <li>
                    <a href="#rsvp">RSVP</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Hero Menu -->
      </section>
      <!-- End Hero -->
    </div>
    <!-- End Header -->

    <!-- Begin Main Content -->
    <div class="main-content">
    <!-- Begin regular-section-->
     <section class="section-light no-padding-top regular-section has-text-centered has-vertically-aligned-content" id="regular-section">
        
        <div data-aos="fade-up" data-aos-easing="linear">
          <img src="86.png" style="width: 200px" class="has-text-centered" alt="Bismillahirrahmaanirrahiim">
        </div>
        <span class="space40px"></span>

        <p class="bodytext" data-aos="fade-up" data-aos-easing="linear">
          Salam Persahabatan Alumni SMP 1 Magetan Tahun 1986
          <br />
          Kami dari Panitia Reuni ke- 37 tahun, alumni SMP 1 Magetan tahun 1986
          <br />
          mengajak seluruh rekan-rekan alumni untuk berkenan mengisi biodata ringkas.
        </p>

        <span class="space40px"></span>
        <span class="space40px"></span>
        <span class="space40px"></span>
      </section>
      <!-- End regular-section-->    
      
      <!-- Begin Waktu Section -->
      <section class="section-dark" id="Waktu">
        <div class="container">

          <div class="column is-12 regular-section" data-aos="fade-up" data-aos-easing="linear">
            <h1 class="title has-text-centered section-title">Waktu</h1>
          </div>
          <div class="columns is-multiline" data-aos="fade-up" data-aos-easing="linear">
            <div
              class="column has-vertically-aligned-content">
            
              <p class="is-larger has-text-centered">
                  <div class="waktu tanggal-hari has-text-centered">{{ $hari }}</div> 
                  <div class="waktu tanggal-angka has-text-centered">{{ $tanggal }}</div>
                  <div class="waktu tanggal-bulan has-text-centered">{{ $bulan }} {{ $tahun }}</div>
                  <div class="waktu tanggal-bulan has-text-centered">{{ $jam }}</div>
              </p>
            
            </div>

          </div>
        </div>
        <div class="space40px"></div>
        <div class="main-content has-text-centered" data-aos="fade-up" data-aos-easing="linear">
          <a href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=NGgzdW00NG84dXFwMzcwNXYxbGliNGxzaWggZGFlbmdkb2FuZ0Bt&amp;tmsrc=daengdoang%40gmail.com" target="_blank" class="button has-tooltip btn-cta" data-tooltip="Add to Calendar" target="_blank" data-aos="zoom-in">
            <i class="far fa-calendar-plus"></i>
            &nbsp;&nbsp;Google Calendar
          </a>
        </div>
      </section>
      <!-- End Waktu Content -->

      <!-- Begin Lokasi Section -->
      <section class="section-darker" id="lokasi" >
        <div class="container">
          <div class="column is-12 regular-section" data-aos="fade-up" data-aos-easing="linear">
            <h1 class="title has-text-centered section-title">Lokasi</h1>
            <p class="tempat is-larger has-text-centered">
              <strong>{{ $tempat }}</strong>
              <br>
              {{ $alamat_h }} 
              <br>
              {{ $kec_h }}
              <br>
            </p>
          </div>
          <div class="section-map" data-aos="fade-up" data-aos-easing="linear">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1280267408406!2d106.9691569150978!3d-6.246854895478259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d5988a190d9%3A0x22b6a052b0a6a5f3!2sRM.%20Pondok%20Kenanga!5e0!3m2!1sen!2sid!4v1579433583123!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
          <div class="space40px"></div>
          <div class="has-text-centered" data-aos="fade-up" data-aos-easing="linear">
            <a href="{{ $google_maps }}" class="button btn-cta" target="_blank" data-aos="zoom-in">
              <i class="far fa-directions"></i>
              &nbsp;&nbsp;Google Maps
            </a>
          </div>
        </div>
      </section>
      <!-- End Lokasi Content -->

      <!-- End Tentang Sherly dan Daeng -->

      <!-- Begin RSVP Content -->
      <section class="section-dark contact" id="rsvp">
        <div class="container">
          <div class="columns is-multiline">          
            <div class="column is-12 prolog">
              <h1 class="title has-text-centered section-title" data-aos="fade-up" data-aos-easing="linear">
                Konfirmasi Kehadiran
            </h1>
            </div>
            <div class="column is-12 prolog has-text-centered" data-aos="fade-up" data-aos-easing="linear">
              <p class="h2 subtitle">
                Merupakan suatu kehormatan bagi kami
                <br>
                apabila rekan-rekan berkenan hadir.
                <br>
                <br>
                Jika bisa hadir kami tunggu konfirmasinya dangan cara mengisi form kehadiran, 
                <br>
                Mohon mengisi data nama sesuai KTP atau ijasah yang secara otomatis tervalidasi dengan data base nama Alumni
                <br>
                <br>
                Apabila ada kesulitan atau permasalahan tidak bisa diinput, mohon rekan-rekan melakukan pemberitahuan dengan menyebutkan Nama dan kelas terakhir saat kelulusan.
                <br> 
                <br>
                </p>
     
              <a href="https://api.whatsapp.com/send?phone=628119361777&text=&source=&data=" class="button btn-whatsapp" target="_blank" data-aos="zoom-in">
                <i class="fab fa-whatsapp"></i>
                &nbsp;&nbsp; Sdr. Tommy (CS)
              </a>
              

          
              <a href="{{ url('/reservasi') }}" class="button btn-whatsapp" data-aos="zoom-in">
                <i class="fa fa-cog fa-spin fa-3x fa-fw" style="height: 20px"></i>
                &nbsp;&nbsp; Link Kehadiran
              </a >
              <div class="space40px"></div>

              <div class="space40px"></div>
              <div data-aos="fade-up" data-aos-easing="linear">
                <img src="image/divider-leaves.png" class="divider has-text-centered" alt="~~~">
              </div>
              <div class="space40px"></div>
              <p class="h2 subtitle" data-aos="fade-up" data-aos-easing="linear">
                Panitia Reuni ke – 37 tahun Alumni SMP 1 Magetan
                <br>
              </p>

            </div>
 
         </div>
        </div>
      </section>
      <!-- End RSVP Content -->
    </div>
    <!-- End Main Content -->

    <!-- Begin Footer -->
    <div class="footer">
      <div class="container">
        <a href="https://smp1mgt86.com" class="has-vertically-align">
          <p class="has-vertically-align">2023 &copy Sawung Rehtomo</p>
        </a>
      </div>
    </div>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/menikah.js"></script>
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
      AOS.init({
        easing: "ease-out",
        duration: 800,
      });
    </script>
  </body>
</html>
