<?php require('app/views/header.php'); ?>

<div class="container">
    <form action="users/login" method="GET">
        <div class="form-group">
            <label for="name">Login:</label>
            <input type="name" class="form-control" id="name" name="login" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pswd" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>