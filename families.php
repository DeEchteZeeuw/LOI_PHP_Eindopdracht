<?php include './inc/templates/header.php'; ?>
        <section class="text-black">
            <p>Op deze pagina kunt u de verschillende families aanmaken. U kunt pas na het aanmaken van families familie leden toevoegen via de Leden pagina. Verwijdert u hier een familie dan zullen alle contributies en/of leden hiervan verdwijnen. Bedenk dus goed of u zeker een familie wilt verwijderen. Dit kan grote gevolgen hebben.</p>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'add') { ?>
                <?php $controller->addFamilyForm(); ?>
            <?php } elseif (isset($_GET['id']) && isset($_GET['action']) && ($_GET['action'] === 'update' || $_GET['action'] === 'view' || $_GET['action'] === 'delete')) { ?>
                <?php if ($_GET['action'] === 'update') { ?>
                    <?php $controller->editFamilyForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'delete') { ?>
                    <?php $controller->deleteFamilyForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'view') { ?>
                    <?php $controller->viewFamily(); ?>
                <?php } ?>
            <?php } else { ?>
            <a href="./families.php?action=add">
                <button class="good">Familie(s) toevoegen</button>
            </a>
            <?php $controller->listFamilies(); ?>
            <?php } ?>
        </section>
    <?php include './inc/templates/footer.php'; ?>
</body>
</html>
