<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a href="#" onclick="new_wrap_code(); return false;" class="btn btn-info pull-left display-block">New Wrap Code</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                          <table class="table dt-table scroll-responsive" data-order-col="1" data-order-type="asc">
                              <thead>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th><?php echo _l('options'); ?></th>
                              </thead>
                              <tbody>
                                  <?php 
                                  foreach ($wrap_codes as $wrapcode) { ?>
                                    <tr>
                                        <td><?= $wrapcode['id']; ?></td>
                                        <td><a href="#" onclick="edit_wrap_code(this,<?php echo $wrapcode['id']; ?>); return false" data-name="<?php echo $wrapcode['name']; ?>" data-description="<?php echo $wrapcode['description']; ?>"><?= $wrapcode['name']; ?></a></td>
                                        <td><?= $wrapcode['description']; ?></td>
                                        <td>
                                            <a href="#" onclick="edit_wrap_code(this,<?php echo $wrapcode['id']; ?>); return false" data-name="<?php echo $wrapcode['name']; ?>" data-description="<?php echo $wrapcode['description']; ?>" class="btn btn-default btn-icon"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo admin_url('wrap_codes/delete_wrap_code/' . $wrapcode['id']); ?>" class="btn btn-danger btn-icon _delete"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                  <?php 
                                  } 
                                  ?>
                              </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="wrap_code_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open(admin_url('wrap_codes/wrap_code')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <span class="edit-title">Edit Wrap Code</span>
                    <span class="add-title">Create Wrap Code</span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="additional"></div>
                        <?php echo render_input('name', 'Name'); ?>
                        <div class="form-group">
                            <label for="important" class="control-label clearfix">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
        <?php echo form_close(); ?>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php init_tail(); ?>
<script>
  $(function () {
      appValidateForm($('form'), {name: 'required'}, manage_wrap_codes);
      $('#file_type').on('hidden.bs.modal', function (event) {
          $('#additional').html('');
          $('#source input[name="name"]').val('');
          $(document).find('input[name="name"]').val('');
          $('#file_type input[name="visible_to_customer"]').val(name);
          $('.add-title').removeClass('hide');
          $('.edit-title').removeClass('hide');
      });
  });
  function manage_wrap_codes(form) {
      var data = $(form).serialize();
      var url = form.action;
      $.post(url, data).done(function (response) {
          window.location.reload();
      });
      return false;
  }
  function new_wrap_code() {
      $('#wrap_code_modal').modal('show');
      $('.edit-title').addClass('hide');
  }
  function edit_wrap_code(invoker, id) {
      var name = $(invoker).data('name');
      var description = $(invoker).data('description');
      $('#wrap_code_modal input[name="name"]').val(name);
      $('#wrap_code_modal input[name="description"]').val(description);      
      $('#additional').append(hidden_input('id', id));
      $('#wrap_code_modal').modal('show');
      $('.add-title').addClass('hide');
  }
</script>
</body>
</html>
