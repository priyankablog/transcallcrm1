<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 section-heading section-heading-invoices">Call Summary</h4>
<div class="panel_s">
    <div class="panel-body">
        <table class="table dt-table scroll-responsive" data-order-col="0" data-order-type="desc">
            <thead>
                <tr>
                    <th class="th">ID</th>
                    <th class="th">Date</th>
                    <th class="th">Address</th>
                    <th class="th">Agent ID</th>
                    <th class="th">Agent Name</th>
                    <th class="th">Skill Set ID</th>
                    <th class="th">Language</th>
                    <th class="th">Duration(Secs)</th>
                    <th class="th">Duration(Mins)</th>
                    <th class="th">Hold Time</th>
                    <th class="th">No. of times on hold</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cdata as $calls) { ?>
                <tr>
                    <td><?= $calls['id']; ?></td>
                    <td><?= $calls['originatedstamp']; ?></td>
                    <td><?= $calls['address']; ?></td>
                    <td><?= $calls['agentid']; ?></td>
                    <td><?= $calls['agentgivenname']; ?></td>
                    <td><?= $calls['skillsetid']; ?></td>
                    <td><?= $calls['skillsetname']; ?></td>
                    <td><?= $calls['handlingtime']; ?></td>
                    <td><?= (!empty($calls['handlingtime']))?round($calls['handlingtime']/60,2):"" ?></td>
                    <td><?= $calls['holdtime']; ?></td>
                    <td><?= $calls['numberoftimesonhold']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>