<?php

declare(strict_types=1);

/**
 * Náhľad importu: plán importu pred potvrdením, statický ukážkový obsah.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<nav aria-label="Drobčeková navigácia">
  <ol class="breadcrumb">
    <li><a href="<?= $link->url('transfer.index') ?>">Prenos</a></li>
    <li>Náhľad importu</li>
  </ol>
</nav>

<div class="page-head">
  <h1>Náhľad importu</h1>
</div>

<p class="mb-3">
  Súbor <strong>pochodzky-ukazka.json</strong>, formát verzie <span class="num">1</span>,
  exportovaný <time class="num" datetime="2026-10-01T06:00:00Z">1. 10. 2026</time>:
  <span class="num">2</span> pochôdzky, <span class="num">3</span> ulice, <span class="num">10</span> domov.
</p>

<form method="post" action="<?= $link->url('walk.index') ?>">
  <fieldset class="mb-3">
    <legend class="form-label">Režim importu</legend>
    <div class="form-check">
      <input class="form-check-input" id="mode-merge" name="mode" type="radio" value="MERGE" checked required>
      <label class="form-check-label" for="mode-merge">Zlúčiť</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" id="mode-replace" name="mode" type="radio" value="REPLACE_ALL" required>
      <label class="form-check-label" for="mode-replace">Nahradiť všetko</label>
    </div>
  </fieldset>

  <section class="table-responsive mb-3" aria-label="Plán importu" aria-live="polite">
    <table class="table">
      <thead>
        <tr>
          <th>Pochôdzka</th>
          <th>Zmena</th>
          <th class="text-end">Zaniknuté poradia</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Rajón 3 – 013 24 Strečno</td>
          <td>pribudne</td>
          <td class="text-end num"></td>
        </tr>
        <tr>
          <td>Rajón 2 – 013 24 Strečno</td>
          <td>prepíše sa</td>
          <td class="text-end num">2</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Spolu</th>
          <td></td>
          <td class="text-end num">2</td>
        </tr>
      </tfoot>
    </table>
  </section>

  <div class="form-actions">
    <button class="btn btn-primary" type="submit">Importovať</button>
    <a class="btn btn-outline-secondary" href="<?= $link->url('transfer.index') ?>">Zrušiť</a>
  </div>
</form>
