<?php

$title = "Connexion";

?>

<h2>Connexion</h2>
<?php if (isset($msg)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?php
        echo $msg;
        unset($msg);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form action="index.php?controller=userController&action=loginAction" method="POST">
    <div class="mb-3">
        <label class="form-label">Login </label>
        <input type="text" class="form-control" name="login" placeholder="Login">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" name="ajouter" value="Connexion">
    </div>
</form>

