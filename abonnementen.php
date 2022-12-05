<?php include './inc/templates/header.php'; ?>
        <section class="text-black">
            <p>Op deze pagina kunt u de verschillende abonnementen bekijken die wij aanbieden per leden. Ook kunt u ze hier aanmaken, aanpassen of verwijderen. Letop acties die u uitvoert worden meteen verwerkt. De abonnementen zijn een indicatie van onder andere de contributie. De berekening kunt u vinden op het dashboard pagina waar u ook de openstaande betalingen kunt zien.</p>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'add') { ?>
                <?php $controller->addMemberTypeForm(); ?>
            <?php } elseif (isset($_GET['id']) && isset($_GET['action']) && ($_GET['action'] === 'update' || $_GET['action'] === 'view' || $_GET['action'] === 'delete')) { ?>
                <?php if ($_GET['action'] === 'update') { ?>
                    <?php $controller->editMemberTypeForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'delete') { ?>
                    <?php $controller->deleteMemberTypeForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'view') { ?>
                    <?php $controller->viewMemberType(); ?>
                <?php } ?>
            <?php } else { ?>
            <a href="./abonnementen.php?action=add">
                <button class="good">Abonnement toevoegen</button>
            </a>
            <?php $controller->listMemberTypes(); ?>
            <?php } ?>
        </section>
    <?php include './inc/templates/footer.php'; ?>
</body>
</html>
