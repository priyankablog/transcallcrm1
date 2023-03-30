<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a href="#" onclick="new_dc(); return false;" class="btn btn-info pull-left display-block">New Data Collection</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                          <table class="table dt-table scroll-responsive" data-order-col="1" data-order-type="asc">
                              <thead>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Category</th>
                              <th><?php echo _l('options'); ?></th>
                              </thead>
                              <tbody>
                                  <?php 
                                  foreach ($dc_data as $dc) { ?>
                                    <tr>
                                        <td><?= $dc['id']; ?></td>
                                        <td><?= $dc['name']; ?></td>
                                        <td><?= $dc['description']; ?></td>
                                        <td><?= $dc['category_name']; ?></td>
                                        <td>
                                            <a href="#" onclick="edit_dc(this,<?php echo $dc['id']; ?>); return false" data-name="<?php echo $dc['name']; ?>" data-category="<?= $dc['categoryid']; ?>" data-description="<?php echo $dc['description']; ?>" class="btn btn-default btn-icon"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo admin_url('dc_master/delete_dc/' . $dc['id']); ?>" class="btn btn-danger btn-icon _delete"><i class="fa fa-remove"></i></a>
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
<div class="modal fade" id="dc_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open(admin_url('dc_master/dc')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <span class="edit-title">Edit Data Collection</span>
                    <span class="add-title">Create Data Collection</span>
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

                        <div class="form-group">
                            <label for="important" class="control-label clearfix">Category</label>
                            <select name="catid" class="form-control">
                              <option value="" selected="">Select Category</option>
                              <?php
                                foreach($dc_cat as $d){
                                  ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                                  <?php
                                }
                              ?>
                            </select>
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
      appValidateForm($('form'), {name: 'required',catid: 'required'}, manage_dc);
      $('#file_type').on('hidden.bs.modal', function (event) {
          $('#additional').html('');
          $('#source input[name="name"]').val('');
          $(document).find('input[name="name"]').val('');
          $('#file_type input[name="visible_to_customer"]').val(name);
          $('.add-title').removeClass('hide');
          $('.edit-title').removeClass('hide');
      });
  });
  function manage_dc(form) {
      var data = $(form).serialize();
      var url = form.action;
      $.post(url, data).done(function (response) {
          window.location.reload();
      });
      return false;
  }
  function new_dc() {
      $('#dc_modal input[name="name"]').val("");
      $('#dc_modal input[name="description"]').val("");      
      $('#dc_modal select[name="category"]').val("");
      $('#dc_modal').modal('show');
      $('.edit-title').addClass('hide');
  }
  function edit_dc(invoker, id) {
      var name = $(invoker).data('name');
      var description = $(invoker).data('description');
      var category = $(invoker).data('category');
      $('#dc_modal input[name="name"]').val(name);
      $('#dc_modal input[name="description"]').val(description);      
      $('#dc_modal select[name="category"]').val(category);      
      $('#additional').append(hidden_input('id', id));
      $('#dc_modal').modal('show');
      $('.add-title').addClass('hide');
  }
</script>
</body>
</html>
