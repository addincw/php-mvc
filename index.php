<?php
session_start();
require_once 'Models/User.php';

$title = 'Home';
require_once 'Layouts/header.php';

$user = new User();
// get user all
$users = $user->all();
?>

<?php if( isset($_SESSION['notif']) ) : ?>
    <div id="notif" class="notification <?= $_SESSION['notif']['type'] ?>" style="position: absolute; top: 65px; right: 10px;">
        <button id="notifBtn" class="delete"></button>
        <?= $_SESSION['notif']['message'] ?>
    </div>

    <script type="text/javascript">
    setTimeout(() => {
        if(document.getElementById('notif'))
            document.getElementById('notif').remove();
    }, 2000);
    
    var notifBtn = document.getElementById('notifBtn');

    notifBtn.addEventListener('click', function () {
        document.getElementById('notif').remove();
    })
    </script>
<?php
    unset($_SESSION['notif']);
endif;
?>

<!-- hero page -->
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        All User
      </h1>
      <h2 class="subtitle">
        List seluruh user
      </h2>
    </div>
  </div>
</section>

<!-- content -->
<section class="section">
    <div class="container">
        <a href="create.php" class="button is-primary" style="margin-bottom: 15px;">
            <span class="icon is-small" style="margin-right: 5px;">
                <i class="fas fa-plus"></i>
            </span>
            Tambah User
        </a>

        <table class="table is-bordered is-hoverable" width="50%;">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($users as $user) : 
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->gender ?></td>
                    <td>
                        <p class="buttons">
                            <a class="button is-small is-info" href="update.php?id=<?= $user->id ?>">
                                <span class="icon is-small">
                                <i class="fas fa-edit"></i>
                                </span>
                            </a>
                            <a class="button is-small is-danger" href="actions.php?type=delete&id=<?= $user->id ?>">
                                <span class="icon is-small">
                                <i class="fas fa-trash"></i>
                                </span>
                            </a>
                    </td>
                </tr>
                <?php 
                $no++;
                endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</section>


<?php require_once 'Layouts/footer.php'; ?>