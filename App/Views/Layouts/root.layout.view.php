<?php

declare(strict_types=1);

/**
 * Rozloženie stránok doručovateľa: hlavička dokumentu, horná lišta s hlavným menu a rámec obsahu,
 * do ktorého framework vloží pohľad. Meno používateľa v lište je zatiaľ ukážkové, prihlásenie ešte nie je.
 */

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

// Rozloženie nedostáva dáta z kontroléra, sekciu menu preto určí podľa adresy aktuálnej akcie.
$currentPage = $link->url([]);
$transferActive = $currentPage === $link->url('transfer.index')
    || $currentPage === $link->url('transfer.preview');
?>
<!DOCTYPE html>
<html lang="sk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e(App\Configuration::APP_NAME) ?></title>
  <link rel="icon" href="<?= $link->asset('img/logo.svg') ?>">
  <link rel="stylesheet" href="<?= $link->asset('css/app.css') ?>">
</head>
<body>
  <header class="navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= $link->url('walk.index') ?>">
        <img src="<?= $link->asset('img/logo.svg') ?>" alt="" width="30" height="30">
        <?= e(App\Configuration::APP_NAME) ?>
      </a>
      <div class="navbar-menu">
        <nav class="nav" aria-label="Hlavná navigácia">
          <ul>
            <li><a class="nav-link<?= $transferActive ? '' : ' active' ?>" href="<?= $link->url('walk.index') ?>">Pochôdzky</a></li>
            <li><a class="nav-link<?= $transferActive ? ' active' : '' ?>" href="<?= $link->url('transfer.index') ?>">Prenos</a></li>
          </ul>
        </nav>
        <div class="navbar-user">
          <span>novak</span>
          <form method="post" action="<?= $link->url('auth.logout') ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit">Odhlásiť</button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <section class="container content">
    <?= $contentHTML ?>
  </section>
</body>
</html>
