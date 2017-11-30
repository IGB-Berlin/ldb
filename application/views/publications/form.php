<div class="row">
  <div class="col-md-12">
    <form
      action="/publications/<?= (isset($id) ? 'edit/'.$id : 'new') ?>?super-type-id=<?= $super_type_id ?>"
      method="POST"
    >
      <h1>
        <?php if (isset($id))
          echo ucfirst(sprintf(lang('igb_edit'), $id));
        else
          echo ucfirst(sprintf(lang('igb_create_new'), lang('igb_publication')));
        ?>
      </h1>

      <?php if ($super_type_id && $super_type['help']): ?>
        <div class="panel panel-default text-muted ldb-help">
          <div class="panel-body">
            <i class="glyphicon glyphicon-info-sign"></i>
            <strong>
              <?= ucfirst($super_type['name']) ?>
            </strong>
            <p>
              <?= $super_type['help'] ?>
            </p>
          </div>
        </div>
      <?php endif ?>

      <?= validation_errors() ?>

      <?php if (isset($id)): ?>
        <input type="hidden" name="id" value="<?= $id ?>" />
        <input type="hidden" name="return_to" value="<?= set_value('return_to', $referrer) ?>" />
      <?php endif; ?>

      <?php if (! $super_type_id): ?>
        <?php $this->load->view('partials/super_form_grid'); ?>
      <?php else: ?>
        <?php $this->load->view('publications/type') ?>
        <?php $this->load->view('publications/sub_forms/'.$super_type['code']) ?>
        <hr />
        <?php $this->load->view('partials/form_submit', ['continue' => TRUE]) ?>
      <?php endif; ?>
    </form>
  </div>
</div>