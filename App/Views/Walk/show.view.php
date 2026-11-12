<?php

declare(strict_types=1);

/**
 * Ulice pochôdzky: zoznam ulíc s formulárom na pridanie, akciami riadku a oknami na premenovanie a presun ulice
 * do inej pochôdzky. Okno je otvorené, keď kontrolér pošle ulicu na premenovanie alebo presun.
 */

/** @var \App\Models\Walk $walk */
/** @var \App\Models\Street[] $streets */
/** @var string|null $message */
/** @var \App\Models\Street|null $renaming */
/** @var \App\Models\Street|null $moving */
/** @var \App\Models\Walk[] $walks */
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

<?php if ($message !== null) { ?>
<div class="alert" role="status">
  <span><?= e($message) ?></span>
  <button class="btn-close" type="button" aria-label="Zavrieť">×</button>
</div>
<?php } ?>

<form class="entry" method="post" action="<?= $link->url('street.store', ['walkId' => $walk->getId()]) ?>">
  <label class="form-label" for="street-name">Nová ulica</label>
  <div class="input-group">
    <input class="form-control" id="street-name" name="name" type="text" maxlength="100" required>
    <button class="btn btn-primary" type="submit">Pridať</button>
  </div>
</form>

<?php if ($streets === []) { ?>
<p>V pochôdzke zatiaľ nie je žiadna ulica. Pridajte ju formulárom vyššie.</p>
<?php } else { ?>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Ulica</th>
        <th><span class="visually-hidden">Akcie</span></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($streets as $street) { ?>
      <tr>
        <td><a href="<?= $link->url('street.edit', ['id' => $street->getId()]) ?>"><?= e($street->getName()) ?></a></td>
        <td>
          <form class="row-actions" method="post" action="<?= $link->url('street.delete', ['id' => $street->getId()]) ?>">
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('street.edit', ['id' => $street->getId()]) ?>">Upraviť</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('sequence.index', ['streetId' => $street->getId()]) ?>">Poradia</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('walk.show', ['id' => $walk->getId(), 'rename' => $street->getId()]) ?>">Premenovať</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?= $link->url('walk.show', ['id' => $walk->getId(), 'move' => $street->getId()]) ?>">Presunúť</a>
            <button class="btn btn-sm btn-outline-danger" type="submit">Zmazať</button>
          </form>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>

<div class="modal<?= $renaming !== null ? ' show' : '' ?>" role="dialog" aria-label="Premenovať ulicu">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('street.update', ['id' => $renaming?->getId()]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Premenovať ulicu</h2>
        <a class="btn-close" href="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>" aria-label="Zavrieť">×</a>
      </div>
      <div class="modal-body">
        <label class="form-label" for="rename-name">Názov ulice</label>
        <input class="form-control" id="rename-name" name="name" type="text" maxlength="100" required
               value="<?= e($renaming?->getName()) ?>"<?= $renaming !== null ? ' autofocus' : '' ?>>
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-secondary" href="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">Zrušiť</a>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>

<div class="modal<?= $moving !== null ? ' show' : '' ?>" role="dialog" aria-label="Presunúť ulicu">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= $link->url('street.move', ['id' => $moving?->getId()]) ?>">
      <div class="modal-header">
        <h2 class="modal-title">Presunúť ulicu</h2>
        <a class="btn-close" href="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>" aria-label="Zavrieť">×</a>
      </div>
      <div class="modal-body">
        <label class="form-label" for="move-walk">Pochôdzka</label>
        <select class="form-select" id="move-walk" name="walkId" required<?= $moving !== null ? ' autofocus' : '' ?>>
          <?php foreach ($walks as $target) { ?>
          <option value="<?= $target->getId() ?>"<?= $target->getId() === $moving?->getWalkId() ? ' selected' : '' ?>><?= e($target->getName()) ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-secondary" href="<?= $link->url('walk.show', ['id' => $walk->getId()]) ?>">Zrušiť</a>
        <button class="btn btn-primary" type="submit">Uložiť</button>
      </div>
    </form>
  </div>
</div>
