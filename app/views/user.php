<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>
<?php echo flash('created') ?>

<form action="/user/update" method="post">
    <?php echo getToken() ?>
    <input type="text" name="firstName" id="firstName" value="Railton">
    <?php echo flash('firstName', 'color: red') ?>
    <input type="text" name="lastName" id="lastName" value="Leal">
    <?php echo flash('lastName') ?>
    <input type="email" name="email" id="email" value="railtonleal98@gmail.com">
    <?php echo flash('email') ?>
    <input type="password" name="password" id="password" value="123">
    <?php echo flash('password') ?>

    <button type="submit">Salvar</button>
</form>