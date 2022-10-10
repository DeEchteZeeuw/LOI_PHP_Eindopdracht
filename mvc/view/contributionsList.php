<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Lid</th>
            <th>Betaald</th>
            <th>Boekjaar</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Contributions as $contribution) { ?>
            <tr>
                <td><?php echo $contribution->ID; ?></td>
                <td><?php echo $contribution->member; ?></td>
                <td><?php echo $contribution->payed; ?></td>
                <td><?php echo $contribution->bookyear; ?></td>
                <td>
                    <a href="./contributies.php?action=update&id=<?php echo $contribution->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./contributies.php?action=delete&id=<?php echo $contribution->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
