<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Contributie Percentage</th>
            <th>Omschrijving</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($MemberTypes as $memberType) { ?>
            <tr>
                <td><?php echo $memberType->ID; ?></td>
                <td><?php echo $memberType->name; ?></td>
                <td><?php echo $memberType->procentage; ?></td>
                <td><?php echo $memberType->description; ?></td>
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
            </tr>
        <?php } ?>
    </tbody>
</table>