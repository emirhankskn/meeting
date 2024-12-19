<?php include ("templates/_head.php") ?>

<script src="assets/js/functions.js"></script>

<body class="body-professional">


  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <div id="alertContainer"></div>

  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
        <div class="social-links mt-3 text-center">
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
          <a href="#" class="discord"><i class="bx bxl-discord"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php#hero" class="nav-link scrollto active"><i class="bx bx-home"></i><span>Home</span></a>
          </li>
          <li><a href="index.php#about" class="nav-link scrollto"><i
                class="bx bx-dollar-circle"></i><span>Products</span></a></li>
          <li><a href="index.php#resume" class="nav-link scrollto"><i class="bx bx-wrench"></i><span>Features</span></a>
          </li>
          <li><a href="index.php#contact" class="nav-link scrollto"><i
                class="bx bx-envelope"></i><span>Contact</span></a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- ======= Header ======= -->

  <main id="main">
    <div class="container-fluid py-5 mx-auto">
      <div class="card-product d-flex flex-column justify-content-between py-4 px-4">
        <div class="d-flex justify-content-between px-3">
          <div class="mr-3">
            <img src="assets/img/logo.png">
          </div>
          <div class="text-end">
            <div class="d-flex justify-content-end">
              <span class="mdi--professional-hexagon"></span>
              <h2>Professional Plan</h2>
            </div>
            <h6>
              <i class="bx bx-wrench"></i>
              ALL OF THE FEATURES
              -
              <i class="bx bx-chat"></i>
              LIFELONG TECHNIC SUPPORT
            </h6>
            <ion-icon style="font-size:25px;" name="star"></ion-icon>
            <ion-icon style="font-size:25px;" name="star"></ion-icon>
            <ion-icon style="font-size:25px;" name="star"></ion-icon>
            <ion-icon style="font-size:25px;" name="star-half"></ion-icon>
            <ion-icon style="font-size:25px;" name="star-outline"></ion-icon>
            <h4 style="text-indent:20px;">Our program is still in trial version. But you should know that
              we are improving it even more every day. If you encounter technical
              problems, you can contact us 24/7. One program to organize, review,
              transcribe or analyze all your meetings.</h4>
          </div>
        </div>
        <div class="row d-flex flex-column justify-content-between">
          <div class="d-flex gap-3">
            <img class="prod-pic my-1" src="assets/img/prod1.png" onclick="enlargeImage(this)">
            <img class="prod-pic my-1" src="assets/img/prod2.png" onclick="enlargeImage(this)">
            <img class="prod-pic my-1" src="assets/img/prod3.png" onclick="enlargeImage(this)">
            <img class="prod-pic my-1" src="assets/img/prod4.png" onclick="enlargeImage(this)">
          </div>

          <button>
            <form action="log-reg.php" method="POST">
              <button name="create-serial-pro" type="submit" class="btn btn-pink ml-auto">
                <div>SUBSCRIBE <strong style="font-size:20px;">10$</strong> Per/Month</div>
              </button>
            </form>
          </button>

        </div>
      </div>
    </div>
  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <?php include ("templates/_scripts.php") ?>

</body>