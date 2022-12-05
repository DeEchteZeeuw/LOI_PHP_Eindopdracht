<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Boekjaar</th>
            <?php if (!isset($_GET['action'])) { ?>
            <th colspan="3">&nbsp;</th>
            <?php } else { ?>
            <th>Bedrag</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($BookYears as $bookYear) { ?>
            <tr>
                <td><?php echo $bookYear->ID; ?></td>
                <td><?php echo $bookYear->year; ?></td>
                <?php if (!isset($_GET['action'])) { ?>
                <td>
                    <a href="./boekjaar.php?action=view&id=<?php echo $bookYear->ID; ?>">    
                        <button class="primary">Bekijken</button>
                    </a>
                </td>
                <td>
                    <a href="./boekjaar.php?action=update&id=<?php echo $bookYear->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./boekjaar.php?action=delete&id=<?php echo $bookYear->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
                <?php } else { ?>
                <td><?php echo $bookYear->price; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>