<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>

<form action="/contact" method="post">
    <input type="email" name="email" id="email" placeholder="E-mail">
    <input type="text" name="subject" id="subject" placeholder="Assunto">
    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <button type="submit">Send</button>
</form>