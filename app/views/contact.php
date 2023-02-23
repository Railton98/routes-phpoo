<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>
<?php echo flash('sent_success', 'color: green;') ?>
<?php echo flash('sent_error', 'color: red;') ?>

<form action="/contact" method="post">
    <?php echo getToken() ?>
    <?php echo flash('email') ?>
    <input type="email" name="email" id="email" placeholder="E-mail">
    <?php echo flash('subject') ?>
    <input type="text" name="subject" id="subject" placeholder="Assunto">
    <?php echo flash('message') ?>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <button type="submit">Send</button>
</form>