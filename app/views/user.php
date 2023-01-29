<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>

<form action="/user/update" method="post">
    <?php echo getToken(); ?>
    <input type="text" name="firstName" id="firstName" value="Railton">
    <input type="text" name="lastName" id="lastName" value="Leal">
    <input type="email" name="email" id="email" value="railtonleal98@gmail.com">
    <input type="password" name="password" id="password" value="123">

    <button type="submit">Salvar</button>
</form>