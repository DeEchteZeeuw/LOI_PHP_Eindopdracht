<table>
    <thead>
        <tr>
            <th>Familie</th>
            <th>Openstaande contributie</th>
            <th>Betaalde contributie</th>
            <th>Totale contributie</th>
            <th>Procentueel</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($families as $family) { ?>
        <tr>
            <td width="25%"><?php echo $family->name; ?></td>
            <td><?php echo $family->open_contribution; ?></td>
            <td><?php echo $family->payed_contribution; ?></td>
            <td><?php echo $family->total_contribution; ?></td>
            <td><?php echo round((floatval($family->payed_contribution)/ ($family->total_contribution > 0 ? $family->total_contribution : 1)) * 100, 2); ?>/100</td>
            <td>
                <button show-row="<?php echo $family->ID; ?>">Bekijk per familie lid</button>
            </td>
        </tr>
        <?php foreach($family->members as $member) { ?>
        <tr family="<?php echo $family->ID; ?>" hidden="true">
            <td><?php echo $member->name; ?> <?php echo $family->name; ?></td>
            <td><?php echo $member->open_contribution; ?></td>
            <td><?php echo $member->payed_contribution; ?></td>
            <td><?php echo $member->total_contribution; ?></td>
            <td><?php echo round((floatval($member->payed_contribution)/ ($member->total_contribution > 0 ? $member->total_contribution : 1)) * 100, 2); ?>/100</td>
            <td>
                <button show-years="<?php echo $member->ID; ?>">Bekijk per jaar</button>
            </td>
        </tr>
        <?php foreach($member->contributions as $contribution) { ?>
        <tr family-member="<?php echo $member->ID; ?>" hidden="true">
            <td>Jaar <?php echo $contribution->bookyear->year; ?></td>
            <td><?php echo $contribution->open_contribution; ?></td>
            <td><?php echo $contribution->payed; ?></td>
            <td><?php echo $contribution->total_contribution; ?></td>
            <td><?php echo round((floatval($contribution->payed)/ ($contribution->total_contribution > 0 ? $contribution->total_contribution : 1)) * 100, 2); ?>/100</td>
            <td></td>
        </tr>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>