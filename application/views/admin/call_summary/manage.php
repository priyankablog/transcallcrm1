<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                          <table class="table dt-table scroll-responsive" data-order-col="1" data-order-type="asc">
                              <thead>
                              <th>Id</th>
                              <th>Date</th>
                              <th>Provider Contact ID</th>
                              <th>Address</th>
                              <th>Agent ID</th>
                              <th>Agent Name</th>
                              <th>Client ID</th>
                              <th>Client Name</th>
                              <th>Skill Set ID</th>
                              <th>Language</th>
                              <th>Duration(Secs)</th>
                              <th>Duration(Mins)</th>
                              <th>Hold Time</th>
                              <th>No. of times on hold</th>
                              </thead>
                              <tbody>
                                  <?php 
                                  foreach ($cdata as $call) { ?>
                                    <tr>
                                        <td><?= $call['id']; ?></td>
                                        <td><?= $call['originatedstamp']; ?></td>
                                        <td><?= $call['providercontactid']; ?></td>
                                        <td><?= $call['address']; ?></td>
                                        <td><?= $call['agentid']; ?></td>
                                        <td><?= $call['agentgivenname']; ?></td>
                                        <td><?= $call['customerid']; ?></td>
                                        <td><?= $call['company']; ?></td>
                                        <td><?= $call['skillsetid']; ?></td>
                                        <td><?= $call['skillsetname']; ?></td>
                                        <td><?= $call['handlingtime']; ?></td>
                                        <td><?= (!empty($call['handlingtime']))?round($call['handlingtime']/60,2):"" ?></td>
                                        <td><?= $call['holdtime']; ?></td>
                                        <td><?= $call['numberoftimesonhold']; ?></td>
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
<?php init_tail(); ?>
</body>
</html>
