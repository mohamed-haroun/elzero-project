<?php
$user = null;

if(!isset($_SESSION['user'])) {
    header('Location: /login');
} else {
    $user = $_SESSION['user'];
}

?>

<div class="container">
    <div class="row">
        <div class="col col-3 mt-5">
            <h4>Hello User <span class='user'><?=$user->first_name;?></span></h4>
        </div>
        <div class="col">
        </div>
    </div>
</div>