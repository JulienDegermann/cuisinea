<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
  <?php foreach ($menus as $key => $menu) { ?>
    <li class="nav-item"><a href="<?= $key; ?>" class="nav-link px-2 <?= $key === $current_page ? 'active' : '' ?>"><?= $menu; ?></a></li>
  <?php } ?>
</ul>