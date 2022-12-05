<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <?php if (!isset($_GET['action'])) { ?>
            <th colspan="3">&nbsp;</th>
            <?php } else { ?>
            <th>Procentage</th>
            <th>Omschrijving</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($MemberTypes as $memberType) { ?>
            <tr>
                <td><?php echo $memberType->ID; ?></td>
                <td><?php echo $memberType->name; ?></td>
                <?php if (!isset($_GET['action'])) { ?>
                <td>
                    <a href="./abonnementen.php?action=view&id=<?php echo $memberType->ID; ?>">    
                        <button class="primary">Bekijken</button>
                    </a>
                </td>
                <td>
                    <a href="./abonnementen.php?action=update&id=<?php echo $memberType->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./abonnementen.php?action=delete&id=<?php echo $memberType->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
                <?php } else { ?>
                <td><?php echo $memberType->procentage; ?></td>
                <td><?php echo $memberType->description; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>