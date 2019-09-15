<?php
session_start();
require_once "Models\User.php";

$user = new User ();

$action = $_REQUEST['type'];

switch ($action) {
    case 'insert':
        // insert user
        $result = $user->insert([
            'name' => $_REQUEST['name'],
            'gender' => $_REQUEST['gender']
        ]);

        if ($result == 1){
            $_SESSION['notif']['type'] = 'is-success';
            $_SESSION['notif']['message'] = $result . ' data berhasil di tambahkan.';
            
            header('Location: index.php');
            break;
        }
        
        $_SESSION['notif']['type'] = 'is-danger';
        $_SESSION['notif']['message'] = 'data gagal di tambahkan.';

        header('Location: create.php');    
        break;
    
    case 'update':
        // update user by id
        $result = $user->updateById($_REQUEST['id'], [
            'name' => $_REQUEST['name'],
            'gender' => $_REQUEST['gender']
        ]);

        if ($result == 1){
            $_SESSION['notif']['type'] = 'is-success';
            $_SESSION['notif']['message'] = $result . ' data berhasil di perbarui.';

            header('Location: index.php');
            break;
        }

        $_SESSION['notif']['type'] = 'is-danger';
        $_SESSION['notif']['message'] = 'data gagal di perbarui.';

        header('Location: create.php'); 
        break;

    case 'delete':
        // delete user by id
        $user->deleteById($_REQUEST['id']);

        $_SESSION['notif']['type'] = 'is-success';
        $_SESSION['notif']['message'] = 'data berhasil di hapus.';

        header('Location: index.php');
        break;
}
