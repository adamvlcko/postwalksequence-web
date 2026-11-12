<?php

declare(strict_types=1);

/**
 * Pochôdzky: zoznam pochôdzok s počtom ulíc, formulárom na pridanie, akciami riadku a oknom na premenovanie.
 * Okno je otvorené, keď kontrolér pošle pochôdzku na premenovanie.
 */

/** @var \App\Models\Walk[] $walks */
/** @var string|null $message */
/** @var \App\Models\Walk|null $editing */
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="page-head">
  <h1>Pochôdzky</h1>
</div>

<?php if ($message !== null) { ?>
<div class="alert" role="status">
  <span><?= e($message) ?></span>
  <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
</div>
<?php } ?>

<form class="entry" method="post" action="<?= $link->url('walk.store') ?>">
  <label class="form-label" for="walk-name">Nová pochôdzka</label>
  <div class="input-group">
    <input class="form-control" id="walk-name" name="name" type="text" maxlength="100" required>
    <button class="btn btn-primary" type="submit">Pridať</button>
  </div>
</form>

<?php if ($walks === []) { ?>
<p>Zatiaľ nemáte žiadnu pochôdzku. Pridajte ju formulárom vyššie alebo ju naimportujte zo súboru na stránke <a href="<?= $link->url('transfer.index') ?>">Prenos</a>.</p>
<?php } else { ?>
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
      <?php foreach ($walks as $walk) { ?>
      <?php $created = strtotime($walk->getCreatedAt()); ?>
      <tr>
        <td><a href="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>"><?= e($walk->getName()) ?></a></td>
        <td><time class="num" datetime="<?= e(date('Y-m-d', $created)) ?>"><?= e(date('j. n. Y', $created)) ?></time></td>
        <td class="text-end num"><?= count($walk->getStreets()) ?></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('walk.delete', ['id' => $walk->getId()]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('walk.edit', ['id' => $walk->getId()]) ?>">Premenovať</a>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>

<div class="modal<?= $editing !== null ? ' show' : '' ?>" role="dialog" aria-label="Premenovať pochôdzku">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('walk.update', ['id' => $editing?->getId()]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Premenovať pochôdzku</h2>
        <a class="btn-close" href="<?= $link->url('walk.index') ?>" aria-label="Zavrieť">×</a>
      </div>
      <div class="modal-body">
        <label class="form-label" for="rename-name">Názov pochôdzky</label>
        <input class="form-control" id="rename-name" name="name" type="text" maxlength="100" required
               value="<?= e($editing?->getName()) ?>"<?= $editing !== null ? ' autofocus' : '' ?>>
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-secondary" href="<?= $link->url('walk.index') ?>">Zrušiť</a>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>
