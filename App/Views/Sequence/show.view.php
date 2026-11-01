<?php

declare(strict_types=1);

/**
 * Poradie adresných bodov, statický ukážkový obsah.
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
</div>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-end">Poradie</th>
        <th class="text-end">Číslo</th>
        <th class="text-end">Popisné</th>
        <th class="text-end">Objem</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-end num">1</td>
        <td class="text-end num">12</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">2</td>
        <td class="text-end num">4</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">3</td>
        <td class="text-end num">15</td>
        <td class="text-end num"></td>
        <td class="text-end num">8 OB</td>
      </tr>
      <tr>
        <td class="text-end num">4</td>
        <td class="text-end num">10061</td>
        <td class="text-end num">50</td>
        <td class="text-end num">40 OB</td>
      </tr>
      <tr>
        <td class="text-end num">5</td>
        <td class="text-end num">21</td>
        <td class="text-end num"></td>
        <td class="text-end num">1 OB</td>
      </tr>
      <tr>
        <td class="text-end num">6</td>
        <td class="text-end num">19</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">7</td>
        <td class="text-end num">8</td>
        <td class="text-end num"></td>
        <td class="text-end num">15 OB</td>
      </tr>
      <tr>
        <td class="text-end num">8</td>
        <td class="text-end num">2</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">9</td>
        <td class="text-end num">6</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">10</td>
        <td class="text-end num">10</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">11</td>
        <td class="text-end num">1</td>
        <td class="text-end num"></td>
        <td class="text-end num">8 OB</td>
      </tr>
      <tr>
        <td class="text-end num">12</td>
        <td class="text-end num">9</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">13</td>
        <td class="text-end num">13</td>
        <td class="text-end num"></td>
        <td class="text-end num">25 OB</td>
      </tr>
      <tr>
        <td class="text-end num">14</td>
        <td class="text-end num">23</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">15</td>
        <td class="text-end num">25</td>
        <td class="text-end num"></td>
        <td class="text-end num">5 OB</td>
      </tr>
      <tr>
        <td class="text-end num">16</td>
        <td class="text-end num">27</td>
        <td class="text-end num"></td>
        <td class="text-end num">13 OB</td>
      </tr>
    </tbody>
  </table>
</div>
