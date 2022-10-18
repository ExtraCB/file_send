<?php
if (isset($_SESSION['error'])) { ?>
<div class="alert alert-danger">
  <?= $_SESSION['error'] ?>
  <?php unset($_SESSION['error']) ?>
</div>
<?php  }
if (isset($_SESSION['success'])) { ?>
<div class="alert alert-success">
  <?= $_SESSION['success'] ?>
  <?php unset($_SESSION['success']) ?>
</div>
<?php } ?>