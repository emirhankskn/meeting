<?php include ("templates/_head.php") ?>

<?php include ('config.php'); ?>

<script src="assets/js/functions.js"></script>

<body>


  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <?php include ("templates/_navbar.php") ?>

  <!-- LOGIN REGISTER PROCESS -->
  <?php include ('log-reg.php'); ?>
  <?php include ('log-reg-form.php'); ?>
  <!-- LOGIN REGISTER PROCESS -->

  <?php if (isset($_SESSION['register_success']) && $_SESSION['register_success'] == true): ?>
    <?php echo "<script> flash('User successfully registered. Please log in.', 'alert-success'); </script>" ?>
    <?php $_SESSION['register_success'] = false; ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['msg_success']) && $_SESSION['msg_success'] == true): ?>
    <?php echo "<script> flash('Message successfully sended.', 'alert-success'); </script>" ?>
    <?php $_SESSION['msg_success'] = false; ?>
  <?php endif; ?>


  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'): ?>
      <?php if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true): ?>
        <?php echo "<script> flash('" . $_SESSION['username'] . " successfully logged in.', 'alert-success'); </script>" ?>
        <?php $_SESSION['login_success'] = false; ?>
      <?php endif; ?>

      <a href="dashboard.php">
        <button type="submit" class="btnLogin-popup d-flex align-items-center gap-2"
          style="background-color: #7ce4cb; border-color: #7ce4cb; right:220px;">
          <ion-icon name="bar-chart-outline" style="font-size: 1.5em;"></ion-icon>
          Dashboard
        </button>
      </a>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user'): ?>
      <?php if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true): ?>
        <?php echo "<script> flash('" . $_SESSION['username'] . " successfully logged in.', 'alert-success'); </script>" ?>
        <?php $_SESSION['login_success'] = false; ?>
      <?php endif; ?>
      <a href="account.php">
        <button type="submit" class="btnLogin-popup d-flex align-items-center gap-2"
          style="background-color: #7ce4cb; border-color: #7ce4cb; right:220px;">
          <ion-icon name="person-circle-outline" style="font-size: 1.5em;"></ion-icon>
          Account
        </button>
      </a>
    <?php endif; ?>

    <form method="post" action="log-reg.php">
      <input type="hidden" name="logout">
      <button type="submit" class="btnLogin-popup d-flex align-items-center gap-2"
        style="background-color: #7ce4cb; border-color: #7ce4cb;">
        <ion-icon name="log-out-outline" style="font-size: 1.5em;"></ion-icon>
        <p style="margin: 0;">Logout</p>
      </button>
    </form>

  <?php else: ?>
    <button type="submit" class="btnLogin-popup d-flex align-items-center gap-2">
      <ion-icon name="log-in-outline" style="font-size: 1.5em;"></ion-icon>
      <p style="margin: 0;">Login</p>
    </button>
  <?php endif; ?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>M E E T O R</h1>
      <p>We offer you more <i><strong><span class="typed" style="color:#149ddd;" data-typed-items="clever, efficent, basic, usable"></strong></i></span>
        solutions for online meetings.</p>
      <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome <?php echo $_SESSION['username']; endif; ?> !</p>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>What we offer</h2>
          <p>Thanks to this application, you no longer have to worry about tracking your online meetings. Let our
            program do all the meeting follow-up work for you.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/about-img.jpg" class="img-fluid rounded-5" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>We use AI &amp; New technologies.</h3>
            <p class="fst-italic">Meeting record records and analyzes your meetings for you. These are features:</p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Screen & Sound Recorder</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Speech to Text</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Text to Speech</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Meeting Analyzer</strong></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>File Transcriptor</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Language Translator</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Meetings Manager</strong></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Technic Support</strong></li>
                </ul>
              </div>
            </div>
            <p>Our program is still in trial version. But you should know that we are improving it even more every
              day.
              If you encounter technical problems, you can contact us 24/7. One program to organize, review,
              transcribe
              or analyze all your meetings.</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- FACTS DELETED -->

    <!-- Products -->
    <div class="container mb-5">
      <div class="shop-default shop-cards shop-tech">
        <div class="row d-flex justify-content-evenly">
          <div class="col-md-5">
            <div class="block product no-border z-depth-2-top z-depth-2--hover">
              <div class="block-image">
                <a href="#">
                  <img src="assets/img/550x250.png" class="img-center">
                </a>
              </div>
              <div class="block-body">
                <h3 class="heading heading-5 strong-600 text-capitalize">
                  <a href="#">Default Plan</a>
                </h3>
                <p class="product-description">Limited access to features</p>
                <div class="product-colors mt-2">
                  <div class="color-switch float-wrapper">
                    <a href="#" class="bg-purple"></a>
                    <a href="#" class="bg-pink"></a>
                    <a href="#" class="bg-blue"></a>
                  </div>
                </div>
                <div class="product-buttons mt-4">
                  <div class="d-flex justify-content-between">
                    <div>
                      <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Favorite">
                        <i class="fa fa-heart"></i>
                      </button>
                      <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Compare">
                        <i class="fa fa-envelope"></i>
                      </button>
                    </div>
                    <div>
                      <a href="default.php" class="btn_buy">Buy</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="block product no-border z-depth-2-top z-depth-2--hover">
              <div class="block-image">
                <a href="#">
                  <img src="assets/img/550x250.png" class="img-center">
                </a>
              </div>
              <div class="block-body">
                <h3 class="heading heading-5 strong-600 text-capitalize">
                  <a href="#">Professional Plan</a>
                </h3>
                <p class="product-description">Access to all features</p>
                <div class="product-colors mt-2">
                  <div class="color-switch float-wrapper">
                    <a href="#" class="bg-purple"></a>
                    <a href="#" class="bg-pink"></a>
                    <a href="#" class="bg-blue"></a>
                  </div>
                </div>
                <div class="product-buttons mt-4">
                  <div class="d-flex justify-content-between">
                    <div>
                      <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Favorite">
                        <i class="fa fa-heart"></i>
                      </button>
                      <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Compare">
                        <i class="fa fa-envelope"></i>
                      </button>
                    </div>
                    <div>
                      <a href="professional.php" class="btn_buy">Buy</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Products -->



    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">
        <div class="section-title">
          <h2>Features We Offer</h2>
          <p>You can evaluate the simple features comparison below and choose the plan that best suits on you.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Default Plan</h3>
            <div class="resume-item">
              <h4>Recorder features</h4>
              <ul>
                <li>You can record screen only 30 fps.</li>
                <li>Maximum 60 minutes you can record.</li>
                <li>Recordings are saved in 720p.</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Meeting Analyzer</h4>
              <ul>
                <li>How many words were spoken in the meeting.</li>
                <li>How many people attended the meeting.</li>
                <li>Who spoke the most.</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Live Technic Support</h4>
              <ul>
                <li>First 1 month.</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Recorder features</h4>
              <ul>
                <li>You can record screen 30 / 60 / 144 fps.</li>
                <li>Recording without minutes limit.</li>
                <li>Recordings are saved in 720p / 1080p / 2K.</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Meeting Analyzer</h4>
              <ul>
                <li>Researches the topic being discussed and takes notes.</li>
                <li>Allows you to save people in the meeting by name.</li>
                <li>Analyzes the after of the meeting with details.</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Live Technic Support</h4>
              <ul>
                <li>Lifelong.</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Accuracy Value ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Accuracy Rate</h2>
          <p>Yes, we use the most advanced artificial intelligence models in our program, but of course, artificial
            intelligence has the possibility of making mistakes, just like humans. These errors may increase or
            decrease
            depending on the user's microphone quality or system features. We work every day to minimize this error
            rate.</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">

            <div class="progress">
              <span class="skill">Speech To Text Accuracy <i class="val">87%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Language Translator<i class="val">98%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">File Transribing Accuracy <i class="val">92%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Meeting Analyzer <i class="val">76%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Accuracy Value Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>You can contact us for any technical problems, feedback, criticism or suggestions.</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info rounded-5">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>İnönü, 152. Sokak, 45560 Akhisar/Manisa</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>kskn.1265@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+90 542 636 7701</p>
              </div>

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7384.612794022286!2d27.807159866635157!3d38.90460908464174!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b9d20409aedaf5%3A0x794bab503b120e9e!2sMCB%C3%9C%2C%20Akhisar%20Meslek%20Y%C3%BCksekokulu!5e0!3m2!1str!2str!4v1714070436926!5m2!1str!2str"
                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="log-reg.php" method="POST" class="email-form rounded-5">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center">
                <button class="btn btn-primary btn-lg" type="submit" name="send-message">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <?php include ("templates/_footer.php") ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <?php include ("templates/_scripts.php") ?>