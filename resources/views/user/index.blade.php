<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invitation</title>
  <link rel="stylesheet" href="{{ asset('user') }}/index.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <audio id="background-music" loop>
    <source src="assets/Audio/music.MP3" type="audio/mpeg" />
    Your browser does not support the audio element.
  </audio>

  <nav class="navbar">
    <a href="#cover"><i class="bx bxs-home"></i></a>
    <!-- <a href="#couple"><i class="bx bx-male-female"></i></a> -->
    <a href="#invitation" class="active"><i class="bx bx-calendar"></i></a>
    <!-- <a href="#gift"><i class="bx bx-gift"></i></a> -->
    <a href="#map"><i class="bx bx-map"></i></a>
    <a href="#thank-you"><i class="bx bxs-chevrons-down"></i></a>
    <button id="dark-mode-toggle"></button>
    <!-- <button id="play-pause-toggle">
        <i class="bx bx-play"></i>
      </button> -->
  </nav>

  <header id="cover">
    <p data-aos="fade">Ring in the New Year with us!</p>
    <span class="name" data-aos="fade-down">{{ $user->name }}</span>
    <p data-aos="fade-up">03.02.2025</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave">
      <path fill="#f5f5dc" fill-opacity="1"
        d="M0,128L48,138.7C96,149,192,171,288,197.3C384,224,480,256,576,261.3C672,267,768,245,864,208C960,171,1056,117,1152,96C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave-dark">
      <path fill="#5e4a32" fill-opacity="1"
        d="M0,128L48,138.7C96,149,192,171,288,197.3C384,224,480,256,576,261.3C672,267,768,245,864,208C960,171,1056,117,1152,96C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
  </header>

  <section id="button-penerimaan">
    <h2>Event</h2>
    <button id="myBtn" class="text-inv">Click Here confirm your attendance</button>
    <span>Dresscode: Hitam, Abu-abu, Gold, Merah</span>
    <span>03 February 2025</span>
  </section>
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Apakah Anda Yakin Bisa Hadir</h2>
      <div class="button-container">
        <button class="btn-hadir">Hadir</button>
        <button class="btn-tidak-hadir">Tidak Hadir</button>
      </div>
    </div>
  </div>
    <!-- ini yang update (17-01-2025) -->
  <section id="penutup">
    <section class="location" id="map">
      <h1 style="margin-top: -2rem;">Location</h1>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3632.842759501572!2d112.76399207461904!3d-7.299869671760013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa5385e1323d%3A0xd34919933df0314!2sSekolah%20Menengah%20Kejuruan%2017%20Agustus%201945%20Surabaya!5e1!3m2!1sid!2sid!4v1736866024627!5m2!1sid!2sid"
        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        data-aos="flip-down"></iframe>
    </section>

    <section class="thank-you" id="thank-you">
      <h1>Thank You</h1>
      <p class="description">
        "It is an honor and joy for us if you would kindly attend and give
        your blessings. We thank you for your presence and blessings."
      </p>
      <p>With joy and gratitude, we invite you to share in our happiness.</p>
      <span>Western Dish by Pavilion Restaurant</span>
    </section>
    <footer>
      <a href="https://www.instagram.com/bramm.27">@bramm.27</a>
    </footer>
  </section>
  <!-- penutup -->



  <script src="{{ asset('user') }}/index.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>