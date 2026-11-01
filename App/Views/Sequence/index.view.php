<?php

declare(strict_types=1);

/**
 * Poradia ulice: zoznam denných poradí, statický ukážkový obsah.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<nav aria-label="Drobčeková navigácia">
  <ol class="breadcrumb">
    <li><a href="<?= $link->url('walk.index') ?>">Pochôdzky</a></li>
    <li><a href="<?= $link->url('walk.show', ['id' => 1]) ?>">Rajón 2 – 013 24 Strečno</a></li>
    <li><a href="<?= $link->url('street.edit', ['id' => 1]) ?>">Mládeže</a></li>
    <li>Poradia</li>
  </ol>
</nav>

<div class="page-head">
  <h1>Mládeže, poradia</h1>
  <button class="btn btn-outline-secondary" type="button">Založiť poradie</button>
</div>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Názov</th>
        <th>Dátum</th>
        <th>Verzia</th>
        <th class="text-end">Adresné body</th>
        <th class="text-end" colspan="3">Objem</th>
        <th><span class="visually-hidden">Akcie</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="<?= $link->url('sequence.show', ['id' => 2]) ?>">R listy</a></td>
        <td><time class="num" datetime="2026-10-30">30. 10. 2026</time></td>
        <td>v1</td>
        <td class="text-end num">16</td>
        <td class="volume-icon"><img class="icon" src="<?= $link->asset('img/envelope-light-yellow.svg') ?>" alt="" width="16" height="16"></td>
        <td class="text-end num">155</td>
        <td class="volume-unit">OB</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('sequence.index', ['streetId' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="sort" formaction="<?= $link->url('sequence.sort', ['id' => 2]) ?>">Zaraďovať</button>
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('sequence.show', ['id' => 2]) ?>">Zobraziť</a>
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td><a href="#">R listy</a></td>
        <td><time class="num" datetime="2026-10-29">29. 10. 2026</time></td>
        <td>v1</td>
        <td class="text-end num">22</td>
        <td class="volume-icon"><img class="icon" src="<?= $link->asset('img/envelope-gray.svg') ?>" alt="" width="16" height="16"></td>
        <td class="text-end num">22 <span class="visually-hidden">zásielky</span></td>
        <td class="volume-unit"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('sequence.index', ['streetId' => 1]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="#">Zobraziť</a>
            <button class="btn btn-sm btn-outline-secondary" type="button">Premenovať</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal" role="dialog" aria-label="Založiť poradie">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('sequence.sort', ['id' => 2]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Založiť poradie</h2>
        <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label" for="seq-base">Základ názvu</label>
          <input class="form-control" id="seq-base" name="base" type="text" maxlength="60" required>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" id="seq-valuation" name="valuation" type="checkbox" value="1">
          <label class="form-check-label" for="seq-valuation">Valuácia objemových bodov</label>
        </div>
        <label class="form-label" for="seq-bulk">Predvolená trieda</label>
        <select class="form-select" id="seq-bulk" name="bulk">
          <option value="P">P (do 1 OB)</option>
          <option value="L" selected>L (do 5 OB)</option>
          <option value="10">≤10 (do 10 OB)</option>
          <option value="20">≤20 (do 20 OB)</option>
          <option value="30">≤30 (do 30 OB)</option>
          <option value="50">≤50 (do 50 OB)</option>
        </select>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button">Zrušiť</button>
        <button class="btn btn-primary" type="submit">Založiť</button>
      </div>
    </form>
  </div>
</div>
