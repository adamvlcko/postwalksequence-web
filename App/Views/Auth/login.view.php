<?php

declare(strict_types=1);

/**
 * Prihlásenie: statický ukážkový stav s chybovou správou.
 */

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>
<div class="page-head">
  <h1>Prihlásenie</h1>
</div>

<div class="alert alert-danger" role="alert">Nesprávne meno alebo heslo.</div>

<form method="post" action="<?= $link->url('walk.index') ?>">
  <div class="form-row">
    <div class="form-col mb-3">
      <label class="form-label" for="username">Prihlasovacie meno</label>
      <input class="form-control" id="username" name="username" type="text" maxlength="32" value="novak" required autofocus>
    </div>
    <div class="form-col mb-3">
      <label class="form-label" for="password">Heslo</label>
      <input class="form-control" id="password" name="password" type="password" maxlength="72" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Prihlásiť sa</button>
</form>

<p class="auth-switch">Nemáte účet? <a href="<?= $link->url('auth.register') ?>">Zaregistrujte sa</a></p>
