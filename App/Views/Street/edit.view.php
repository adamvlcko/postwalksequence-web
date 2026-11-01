<?php

declare(strict_types=1);

/**
 * Editor ulice: čísla domov v poradí obchôdzky, statický ukážkový obsah.
 */

/** @var \Framework\Support\LinkGenerator $link */
?>
<nav aria-label="Drobčeková navigácia">
  <ol class="breadcrumb">
    <li><a href="<?= $link->url('walk.index') ?>">Pochôdzky</a></li>
    <li><a href="<?= $link->url('walk.show', ['id' => 1]) ?>">Rajón 2 – 013 24 Strečno</a></li>
    <li>Mládeže</li>
  </ol>
</nav>

<div class="page-head">
  <h1>Mládeže</h1>
  <form method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
    <button class="btn btn-outline-secondary" type="submit">Obrátiť ulicu</button>
  </form>
</div>

<form class="entry" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
  <label class="form-label" for="house-token">Pridať čísla domov</label>
  <div class="input-group">
    <input class="form-control num" id="house-token" name="token" type="text" maxlength="21" pattern="\s*[0-9]{1,10}(\s*/\s*[0-9]{0,10})?\s*" required autofocus>
    <button class="btn btn-primary" type="submit">Pridať</button>
  </div>
  <p class="form-text">Súpisné číslo alebo súpisné/popisné, napr. 10060/49. Medzera alebo Enter číslo pridá na koniec ulice.</p>
</form>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-end">Poradie</th>
        <th class="text-end">Číslo</th>
        <th class="text-end">Popisné</th>
        <th><span class="visually-hidden">Akcie</span></th>
      </tr>
    </thead>
    <tbody aria-live="polite">
      <tr>
        <td class="text-end num">1</td>
        <td class="text-end num">12</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie" disabled>▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">2</td>
        <td class="text-end num">4</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">3</td>
        <td class="text-end num">10060</td>
        <td class="text-end num">49</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">4</td>
        <td class="text-end num">7</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">5</td>
        <td class="text-end num">15</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">6</td>
        <td class="text-end num">10061</td>
        <td class="text-end num">50</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">7</td>
        <td class="text-end num">3</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">8</td>
        <td class="text-end num">21</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">9</td>
        <td class="text-end num">19</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">10</td>
        <td class="text-end num">10065</td>
        <td class="text-end num">52</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">11</td>
        <td class="text-end num">8</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">12</td>
        <td class="text-end num">2</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">13</td>
        <td class="text-end num">6</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">14</td>
        <td class="text-end num">10</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">15</td>
        <td class="text-end num">1</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">16</td>
        <td class="text-end num">5</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">17</td>
        <td class="text-end num">9</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">18</td>
        <td class="text-end num">11</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">19</td>
        <td class="text-end num">13</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">20</td>
        <td class="text-end num">17</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">21</td>
        <td class="text-end num">23</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">22</td>
        <td class="text-end num">25</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr>
        <td class="text-end num">23</td>
        <td class="text-end num">10070</td>
        <td class="text-end num">61</td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie">▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
      <tr class="table-success">
        <td class="text-end num">24</td>
        <td class="text-end num">27</td>
        <td class="text-end num"></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="up" aria-label="Posunúť vyššie">▲</button>
            <button class="btn btn-sm btn-outline-secondary" type="submit" name="op" value="down" aria-label="Posunúť nižšie" disabled>▼</button>
            <button class="btn btn-sm btn-outline-secondary" type="button">Upraviť</button>
            <button class="btn btn-sm btn-outline-danger" type="submit" name="op" value="delete">Zmazať</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal" role="dialog" aria-label="Upraviť číslo domu">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('street.edit', ['id' => 1]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Upraviť číslo domu</h2>
        <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label" for="edit-number">Číslo</label>
          <input class="form-control num" id="edit-number" name="number" type="text" inputmode="numeric" pattern="[0-9]{1,10}" maxlength="10" required>
        </div>
        <label class="form-label" for="edit-descriptive">Popisné</label>
        <input class="form-control num" id="edit-descriptive" name="descriptive" type="text" inputmode="numeric" pattern="[0-9]{1,10}" maxlength="10">
        <p class="form-text">Nepovinné.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button">Zrušiť</button>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>
