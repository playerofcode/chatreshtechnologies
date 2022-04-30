
  <!-- ======= Footer ======= -->
  <footer id="footer" style="background:#24243e;">

    <div class="footer-newsletter" style="background:#302b63;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Subscribe our newsletter for latest updates about <?php echo APP_NAME;?></p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top" style="background: #0f0c29;background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);background: linear-gradient(to right, #24243e, #302b63, #0f0c29);">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url();?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('about-us');?>">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('our-services');?>">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('privacy-policy');?>">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">App Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Custom Web Solution</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hardware Solution</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">ERP development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ed-Tech </a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
               <strong>Lucknow Office:</strong>
              <?php echo ADDRESS;?> <br>
              <strong>Noida Office:</strong>
              <?php echo ADDRESS1; ?><br>
              <strong>Phone:</strong> <?php echo MOBNO;?><br>
              <strong>Email:</strong> <?php echo EMAIL;?><br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About CTech</h3>
            <p>Chatresh Technologies Pvt. Ltd. is a technology consulting, system integration, managed business services, and digital transformation company. </p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/ChatreshT" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/chatreshtechnologies" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/chatreshtechnologies/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; <?php echo date('Y');?> Copyright <strong><span>Chatresh Technologies</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="#" class="text-white">Chatresh Technologies Team</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/home/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('assets/home/')?>vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/home/')?>js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    var typed = new Typed('.typing', {
  strings: ["Explore", "Innovate","Create"],
  typeSpeed: 40
  });
  </script>
</body>

</html>