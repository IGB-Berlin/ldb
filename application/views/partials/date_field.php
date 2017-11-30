<div class="form-group">
  <label class="form-label" for="<?= 'field_'.$name ?>">
    <?= ucfirst($label) ?>
  </label>
  <span class="ldb-required"><?= ($required ? '*' : '&nbsp;') ?></span>
  <date-picker
    data-id="<?= 'field_'.$name ?>"
    name="<?= $name ?>"
    value="<?= set_value($name, $value) ?>"
    <?php if ($help): ?>
      placeholder="<?= ucfirst($help) ?>"
    <?php endif; ?>
  ></date-picker>
</div>