<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <?php if (!isset($_GET['action'])) { ?>
            <th colspan="3">&nbsp;</th>
            <?php } else { ?>
            <th>Adres</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Families as $family) { ?>
            <tr>
                <td><?php echo $family->ID; ?></td>
                <td><?php echo $family->name; ?></td>
                <?php if (!isset($_GET['action'])) { ?>
=               <td>
                    <a href="./families.php?action=view&id=<?php echo $family->ID; ?>">    
                        <button class="primary">Bekijken</button>
                    </a>
                </td>
                <td>
                    <a href="./families.php?action=update&id=<?php echo $family->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./families.php?action=delete&id=<?php echo $family->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
                <?php } else { ?>
                <td><?php echo $family->address; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>