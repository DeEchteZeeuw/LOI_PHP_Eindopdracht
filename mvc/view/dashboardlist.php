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
            <td><?php echo $family->name; ?></td>
            <td><?php echo $family->open_contribution; ?></td>
            <td><?php echo $family->payed_contribution; ?></td>
            <td><?php echo $family->total_contribution; ?></td>
            <td><?php echo (floatval($family->payed_contribution)/ ($family->total_contribution > 0 ? $family->total_contribution : 1)) * 100; ?>/100</td>
            <td>
                <button>Bekijk per familie lid</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>