<?php

declare(strict_types=1);

/**
 * Chybová stránka: kód a hlásenie výnimky, pri zapnutých detailoch aj miesto vzniku a zásobník volaní.
 */

/** @var \Framework\Http\HttpException $exception */
/** @var bool $showDetail */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>
<div class="page-head">
  <h1><?= e($exception->getCode() . " - " . $exception->getMessage()) ?></h1>
</div>

<?php if ($showDetail && $exception->getCode() !== 500) { ?>
  <?= e($exception::class) ?>: <strong><?= e($exception->getMessage()) ?></strong>
  in file <strong><?= e($exception->getFile()) ?></strong>
  at line <strong><?= e($exception->getLine()) ?></strong>
  <pre>Stack trace:<br><?= e($exception->getTraceAsString()) ?></pre>
<?php } ?>

<?php while ($showDetail && $exception->getPrevious() !== null) { ?>
  <?= e($exception->getPrevious()::class) ?>: <strong><?= e($exception->getPrevious()->getMessage()) ?></strong>
  in file <strong><?= e($exception->getPrevious()->getFile()) ?></strong>
  at line <strong><?= e($exception->getPrevious()->getLine()) ?></strong>
  <pre>Stack trace:<br><?= e($exception->getPrevious()->getTraceAsString()) ?></pre>
  <?php $exception = $exception->getPrevious(); ?>
<?php } ?>
