<ul class="nav nav-pills col-12 col-md-auto my-2 flex-column flex-md-row justify-content-center mb-md-0">

  <?php
  $url = explode('/cuisinea/', $_SERVER['REQUEST_URI'])[1];
  foreach ($menus as $key => $menu) { ?>
    <li class="nav-item"><a href="<?= $key; ?>" class="nav-link px-2 <?= $key === $url ? 'active' : '' ?>"><?= $menu; ?></a></li>
  <?php } ?>
</ul>