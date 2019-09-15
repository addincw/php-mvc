<?php
require_once 'Models/User.php';

$title = 'New User';
require_once 'Layouts/header.php';

?>

<!-- hero page -->
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        New User
      </h1>
      <h2 class="subtitle">
        Form tambah user baru.
      </h2>
    </div>
  </div>
</section>

<!-- content -->
<section class="section">
    <div class="container">
        <form action="actions.php" method="post" style="width:50%">
            <input type="hidden" name="type" value="insert">

            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" name="name" type="text" placeholder="e.g Alex Smith">
                </div>
            </div>

            <div class="field">
                <label class="label">Gender?</label>
                <div class="control">
                    <label class="radio">
                    <input type="radio" name="gender"  value="M" checked>
                    Male
                    </label>
                    <label class="radio">
                    <input type="radio" name="gender" value="F">
                    Female
                    </label>
                </div>
            </div>

            <div class="field" style="margin-top: 3rem;">
                <div class="control">
                    <button class="button is-primary is-fullwidth" type="submit"> Submit </button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php require_once 'Layouts/footer.php'; ?>