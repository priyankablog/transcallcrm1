<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal fade" id="invoice_calls_popup_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php echo _l('add_calls_to_invoice'); ?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(count($callsdata) == 0){ ?>
                        <p class="text-danger mtop15"><?php echo _l('invoice_calls_nothing_to_add'); ?></p>
                        <?php } else { ?>
                        <a href="#" onclick="slideToggle('#pre_invoice_project_tasks'); return false;"><b class="label label-info font-medium-xs inline-block"><?php echo _l('invoice_calls_see_calls'); ?></b></a>

                        <div style="display:none;" id="pre_invoice_project_tasks">
                            <div class="checkbox mtop15">
                                <input type="checkbox" id="invoice_calls_select_all_calls" class="invoice_select_all_tasks">
                                <label for="invoice_calls_select_all_calls"><?php echo _l('invoice_calls_select_all_calls'); ?></label>
                            </div>
                            <hr />
                            <div id="tasks_who_will_be_billed">
                            <?php foreach($callsdata as $call){
                                ?>
                                <div class="checkbox checkbox-primary mbot15">
                                    <input type="checkbox" name="calls[]" value="<?php echo $call['id']; ?>" id="<?php echo $call['id']; ?>">
                                    <label class="inline-block full-width" for="<?php echo $call['id']; ?>"><?php echo $call['providercontactid']; ?></label>
                                </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mtop20">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                    <!-- <button type="submit" class="btn btn-info" onclick="invoice_project(<?php echo $project_id; ?>)"><?php echo _l('invoice_project'); ?></button> -->
                </div>
            </div>
        </div>
    </div>
</div>
