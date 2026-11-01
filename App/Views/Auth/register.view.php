<?php

declare(strict_types=1);

/**
 * Registrácia: statický ukážkový stav po kontrole voľného mena.
 */

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>
<div class="page-head">
  <h1>Registrácia</h1>
</div>

<form method="post" action="<?= $link->url('walk.index') ?>">
  <div class="form-row">
    <div class="form-col mb-3">
      <label class="form-label" for="username">Prihlasovacie meno</label>
      <input class="form-control is-valid" id="username" name="username" type="text" pattern="[a-z0-9._\-]{3,32}" maxlength="32" value="nova.dorucovatelka" required autofocus>
      <p class="form-text">3 až 32 znakov: malé písmená, číslice, bodka, pomlčka a podčiarkovník.</p>
      <p class="valid-feedback" aria-live="polite">Meno je voľné.</p>
    </div>
  </div>
  <div class="form-row">
    <div class="form-col mb-3">
      <label class="form-label" for="password">Heslo</label>
      <input class="form-control" id="password" name="password" type="password" minlength="10" required>
      <p class="form-text">Aspoň 10 znakov, aspoň jedno písmeno a jedna číslica, iné ako prihlasovacie meno.</p>
    </div>
    <div class="form-col mb-3">
      <label class="form-label" for="password2">Heslo znova</label>
      <input class="form-control" id="password2" name="password2" type="password" minlength="10" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Zaregistrovať sa</button>
</form>

<p class="auth-switch">Máte účet? <a href="<?= $link->url('auth.login') ?>">Prihláste sa</a></p>
