<?php
session_start();
require_once 'Models\User.php';

$baseUrl = 'http://localhost/myPractices/nativeMVC/public';

$user = new User ();

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
            
            header("Location: {$baseUrl}/");
            break;
        }
        
        $_SESSION['notif']['type'] = 'is-danger';
        $_SESSION['notif']['message'] = 'data gagal di tambahkan.';

        header("Location: {$baseUrl}/create");    
        break;
    
    case 'update':
        // update user by id
        $result = $user->updateById($id, [
            'name' => $_REQUEST['name'],
            'gender' => $_REQUEST['gender']
        ]);

        if ($result == 1){
            $_SESSION['notif']['type'] = 'is-success';
            $_SESSION['notif']['message'] = $result . ' data berhasil di perbarui.';

            header("Location: {$baseUrl}/");
            break;
        }

        $_SESSION['notif']['type'] = 'is-danger';
        $_SESSION['notif']['message'] = 'data gagal di perbarui.';

        header("Location: {$baseUrl}/update/{$id}"); 
        break;

    case 'delete':
        // delete user by id
        $user->deleteById($id);

        $_SESSION['notif']['type'] = 'is-success';
        $_SESSION['notif']['message'] = 'data berhasil di hapus.';

        header("Location: {$baseUrl}/");
        break;
}
