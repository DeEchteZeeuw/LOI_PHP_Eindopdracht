<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Lid</th>
            <th>Boekjaar</th>
            <?php if (!isset($_GET['action'])) { ?>
            <th colspan="3">&nbsp;</th>
            <?php } else { ?>
            <th>Betaald</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Contributions as $contribution) { ?>
            <tr>
                <td><?php echo $contribution->ID; ?></td>
                <td><?php echo $this->model->getFamilyMember($contribution->member)->name; ?> <?php echo $this->model->getFamily($this->model->getFamilyMember($contribution->member)->family)->name; ?></td>
                <td><?php echo $this->model->getBookYear($contribution->bookyear)->year; ?></td>
                <?php if (!isset($_GET['action'])) { ?>
                <td>
                    <a href="./contributies.php?action=view&id=<?php echo $contribution->ID; ?>">    
                        <button class="primary">Bekijken</button>
                    </a>
                </td>
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
                <?php } else { ?>
                <td><?php echo $contribution->payed; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
