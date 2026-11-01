<?php

declare(strict_types=1);

/**
 * Zaraďovanie zásielok: statický ukážkový stav po zaradení čísla domu.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<nav aria-label="Drobčeková navigácia">
  <ol class="breadcrumb">
    <li><a href="<?= $link->url('walk.index') ?>">Pochôdzky</a></li>
    <li><a href="<?= $link->url('walk.show', ['id' => 1]) ?>">Rajón 2 – 013 24 Strečno</a></li>
    <li><a href="<?= $link->url('street.edit', ['id' => 1]) ?>">Mládeže</a></li>
    <li><a href="<?= $link->url('sequence.index', ['streetId' => 1]) ?>">Poradia</a></li>
    <li>R listy (v1)</li>
  </ol>
</nav>

<div class="page-head">
  <h1>Mládeže, R listy (v1)</h1>
  <a class="btn btn-outline-secondary" href="<?= $link->url('sequence.show', ['id' => 2]) ?>">Zobraziť poradie</a>
</div>

<form class="entry" method="post" action="<?= $link->url('sequence.sort', ['id' => 2]) ?>">
  <label class="form-label" for="house">Číslo domu</label>
  <div class="input-group">
    <input class="house num" id="house" name="house" type="text" inputmode="numeric" pattern="[0-9]{1,10}" value="16" required readonly>
    <button class="btn btn-outline-secondary" type="submit" disabled>Potvrdiť</button>
  </div>
</form>

<form class="result sort--ok" method="post" action="<?= $link->url('sequence.sort', ['id' => 2]) ?>">
  <section aria-label="Výsledok zaradenia" aria-live="polite">
    <div class="chain">
      <div class="chain-item prev">
        <span class="chain-label">Predchádzajúci</span>
        <span class="chain-value num">4</span>
      </div>
      <span class="chain-link" aria-hidden="true"></span>
      <div class="chain-item filed">
        <span class="chain-label">
          <img class="icon" src="<?= $link->asset('img/check-circle.svg') ?>" alt="" width="16" height="16">
          Zaradené
        </span>
        <span class="chain-value num">16</span>
      </div>
      <span class="chain-link" aria-hidden="true"></span>
      <div class="chain-item next">
        <span class="chain-label">Nasledujúci</span>
        <span class="chain-value num">15</span>
      </div>
    </div>

    <div class="pile" aria-hidden="true">
      <div class="pile-track">
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s3" style="flex-grow: 8"></span>
        <span class="seg s6" style="flex-grow: 40"></span>
        <span class="seg s1" style="flex-grow: 1"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s4" style="flex-grow: 15"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s3" style="flex-grow: 8"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s5" style="flex-grow: 25"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s2" style="flex-grow: 5"></span>
        <span class="seg s3" style="flex-grow: 13"></span>
      </div>
      <span class="pile-cursor" style="left: 6.452%"></span>
    </div>
    <p class="pile-place num">3. adresný bod, dolný OB 10, 1. kvartil</p>
  </section>

  <div class="result-foot">
    <fieldset class="bulk">
      <legend>Objem zásielky</legend>
      <div class="bulk-options">
        <label class="bulk-option">
          <input type="radio" name="volume" value="P">
          <span class="bulk-text">
            <span class="bulk-name">P</span>
            <span class="bulk-limit num">do 1 OB</span>
          </span>
        </label>
        <label class="bulk-option">
          <input type="radio" name="volume" value="L" checked>
          <span class="bulk-text">
            <span class="bulk-name">L</span>
            <span class="bulk-limit num">do 5 OB</span>
          </span>
        </label>
        <label class="bulk-option">
          <input type="radio" name="volume" value="10">
          <span class="bulk-text">
            <span class="bulk-name">≤10</span>
            <span class="bulk-limit num">do 10 OB</span>
          </span>
        </label>
        <label class="bulk-option">
          <input type="radio" name="volume" value="20">
          <span class="bulk-text">
            <span class="bulk-name">≤20</span>
            <span class="bulk-limit num">do 20 OB</span>
          </span>
        </label>
        <label class="bulk-option">
          <input type="radio" name="volume" value="30">
          <span class="bulk-text">
            <span class="bulk-name">≤30</span>
            <span class="bulk-limit num">do 30 OB</span>
          </span>
        </label>
        <label class="bulk-option">
          <input type="radio" name="volume" value="50">
          <span class="bulk-text">
            <span class="bulk-name">≤50</span>
            <span class="bulk-limit num">do 50 OB</span>
          </span>
        </label>
      </div>
    </fieldset>
    <button class="btn btn-primary" type="submit">Ďalšia zásielka <kbd>Enter</kbd></button>
  </div>
</form>
