<?php
require_once 'Models/User.php';

$title = 'Update User';
require_once 'Layouts/header.php';

$user = new User();
// get user by id
$user = $user->byId($_REQUEST['id']);
?>

<!-- hero page -->
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Update User <?= $user->name ?>
      </h1>
      <h2 class="subtitle">
        Perbarui data user.
      </h2>
    </div>
  </div>
</section>

<!-- content -->
<section class="section">
    <div class="container">
        <form action="actions.php" method="post" style="width:50%">
            <input type="hidden" name="type" value="update">
            <input type="hidden" name="id" value="<?= $user->id ?>">

            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" name="name" type="text" value="<?= $user->name ?>">
                </div>
            </div>

            <div class="field">
                <label class="label">Gender?</label>
                <div class="control">
                    <label class="radio">
                    <input type="radio" name="gender"  value="M" <?php echo $user->gender === 'M' ? 'checked' : ''; ?>>
                    Male
                    </label>
                    <label class="radio">
                    <input type="radio" name="gender" value="F" <?php echo $user->gender === 'F' ? 'checked' : ''; ?>>
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
