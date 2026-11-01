<?php

declare(strict_types=1);

/**
 * Prenos pochôdzok: export a import súboru, statický ukážkový obsah.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="page-head">
  <h1>Prenos</h1>
</div>

<section class="mb-5">
  <h2>Export</h2>
  <form method="post" action="<?= $link->url('transfer.index') ?>">
    <div class="table-responsive mb-3">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Pochôdzka</th>
            <th>Dátum</th>
            <th class="text-end">Ulice</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="form-check">
                <input class="form-check-input" id="export-1" name="walks[]" type="checkbox" value="1">
                <label class="form-check-label" for="export-1">Rajón 2 – 013 24 Strečno</label>
              </div>
            </td>
            <td><time class="num" datetime="2026-07-19">19. 7. 2026</time></td>
            <td class="text-end num">3</td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input class="form-check-input" id="export-3" name="walks[]" type="checkbox" value="3">
                <label class="form-check-label" for="export-3">Rajón 6 – 013 24 Strečno</label>
              </div>
            </td>
            <td><time class="num" datetime="2026-08-02">2. 8. 2026</time></td>
            <td class="text-end num">1</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form-actions">
      <button class="btn btn-outline-secondary" type="submit" name="op" value="selected">Exportovať vybrané</button>
      <button class="btn btn-outline-secondary" type="submit" name="op" value="all">Exportovať všetky</button>
    </div>
  </form>
</section>

<section>
  <h2>Import</h2>
  <form class="form-narrow" method="post" action="<?= $link->url('transfer.preview') ?>" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label" for="import-file">Súbor s pochôdzkami</label>
      <input class="form-control" id="import-file" name="file" type="file" accept=".json,application/json,text/plain" required>
      <div class="form-text">JSON exportovaný z PostWalkSequence, najviac 2 MB.</div>
    </div>
    <fieldset class="mb-3">
      <legend class="form-label">Režim importu</legend>
      <div class="form-check">
        <input class="form-check-input" id="mode-merge" name="mode" type="radio" value="MERGE" checked required>
        <label class="form-check-label" for="mode-merge">
          Zlúčiť
          <span class="form-text">Pochôdzky s rovnakým názvom ako v súbore sa prepíšu, ostatné ostanú.</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" id="mode-replace" name="mode" type="radio" value="REPLACE_ALL" required>
        <label class="form-check-label" for="mode-replace">
          Nahradiť všetko
          <span class="form-text">Zaniknú všetky vaše pochôdzky aj s poradiami, aj tie, ktoré v súbore nie sú.</span>
        </label>
      </div>
    </fieldset>
    <button class="btn btn-primary" type="submit">Zobraziť náhľad</button>
  </form>
</section>
