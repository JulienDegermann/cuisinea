</main>


<div class="container position-relative">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 mb-0 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="index.php" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <img src="assets/images/logo-cuisinea-horizontal.jpg" width="100" alt="logo cuisinéa">
      </a>
      <span class="m-0 mb-1 position-absolute bottom-0 start-0 w-100 text-center text-secondary fst-italic" style="font-size: 12px;">© 2023 Cuisinéa by Julien Degermann</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <?php
      foreach ($networks as $key => $network) { ?>
        <li class="ms-3">
          <a href="<?= $network['url']; ?>"> <?php include _ASSETS_IMG_DIR_ . $network['logo']; ?></a>
        </li>
      <?php } ?>
    </ul>
  </footer>
</div>


<!-- 
<div class="container">
  <footer class="py-3 my-4">
    <?php require 'templates/partial_nav.php'; ?>
    <p class="text-center text-body-secondary">© 2023 Cuisinea, Inc</p>
  </footer>
</div> -->


<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/index.js"></script>
</body>

</html>