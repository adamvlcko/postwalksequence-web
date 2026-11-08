<?php

declare(strict_types=1);

/**
 * Ulice pochôdzky: názov pochôdzky je z databázy, zoznam ulíc je zatiaľ statický ukážkový obsah.
 */

/** @var \App\Models\Walk $walk */
/** @var \Framework\Support\LinkGenerator $link */
?>
<nav aria-label="Drobčeková navigácia">
  <ol class="breadcrumb">
    <li><a href="<?= $link->url('walk.index') ?>">Pochôdzky</a></li>
    <li><?= e($walk->getName()) ?></li>
  </ol>
</nav>

<div class="page-head">
  <h1><?= e($walk->getName()) ?></h1>
</div>

<div class="alert" role="status">
  <span>Ulica Pod hradom bola pridaná.</span>
  <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
</div>

<form class="entry" method="post" action="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">
  <label class="form-label" for="street-name">Nová ulica</label>
  <div class="input-group">
    <input class="form-control" id="street-name" name="name" type="text" maxlength="100" required>
    <button class="btn btn-primary" type="submit">Pridať</button>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Ulica</th>
        <th class="text-end">Domy</th>
        <th><span class="visually-hidden">Akcie</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="<?= $link->url('street.edit', ['id' => 1]) ?>">Mládeže</a></td>
        <td class="text-end num">24</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('street.edit', ['id' => 1]) ?>">Upraviť</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('sequence.index', ['streetId' => 1]) ?>">Poradia</a>
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td><a href="#">Sokolská</a></td>
        <td class="text-end num">5</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="#">Upraviť</a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Poradia</a>
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td><a href="#">Pod hradom</a></td>
        <td class="text-end num">6</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="#">Upraviť</a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Poradia</a>
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal" role="dialog" aria-label="Premenovať ulicu">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Premenovať ulicu</h2>
        <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
      </div>
      <div class="modal-body">
        <label class="form-label" for="rename-name">Názov ulice</label>
        <input class="form-control" id="rename-name" name="name" type="text" maxlength="100" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button">Zrušiť</button>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>
