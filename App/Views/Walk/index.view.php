<?php

declare(strict_types=1);

/**
 * Pochôdzky: zoznam pochôdzok, statický ukážkový obsah.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="page-head">
  <h1>Pochôdzky</h1>
</div>

<div class="alert" role="status">
  <span>Pochôdzka Rajón 6 – 013 24 Strečno bola premenovaná.</span>
  <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
</div>

<form class="entry" method="post" action="<?= $link->url('walk.index') ?>">
  <label class="form-label" for="walk-name">Nová pochôdzka</label>
  <div class="input-group">
    <input class="form-control" id="walk-name" name="name" type="text" maxlength="100" required>
    <button class="btn btn-primary" type="submit">Pridať</button>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pochôdzka</th>
        <th>Dátum</th>
        <th class="text-end">Ulice</th>
        <th><span class="visually-hidden">Akcie</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="<?= $link->url('walk.show', ['id' => 1]) ?>">Rajón 2 – 013 24 Strečno</a></td>
        <td><time class="num" datetime="2026-07-19">19. 7. 2026</time></td>
        <td class="text-end num">3</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.index') ?>">
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td><a href="#">Rajón 6 – 013 24 Strečno</a></td>
        <td><time class="num" datetime="2026-08-02">2. 8. 2026</time></td>
        <td class="text-end num">1</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.index') ?>">
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal" role="dialog" aria-label="Premenovať pochôdzku">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('walk.index') ?>">
      <div class="modal-header">
        <h2 class="modal-title">Premenovať pochôdzku</h2>
        <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
      </div>
      <div class="modal-body">
        <label class="form-label" for="rename-name">Názov pochôdzky</label>
        <input class="form-control" id="rename-name" name="name" type="text" maxlength="100" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button">Zrušiť</button>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>
