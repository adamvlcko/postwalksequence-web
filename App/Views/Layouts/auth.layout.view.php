<?php

declare(strict_types=1);

/**
 * Rozloženie stránok bez prihlásenia (registrácia, prihlásenie): horná lišta iba s logom a názvom aplikácie.
 */

/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
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
    </div>
  </header>

  <section class="container content">
    <?= $contentHTML ?>
  </section>
</body>
</html>
