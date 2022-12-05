<?php include './inc/templates/header.php'; ?>
        <section class="text-black">
            <p>Voor elk jaar kunt u een boekjaar aanmaken. Hier vult u het bedrag in wat moet betaald worden door de leden. Dit bedrag is variabel. Hieronder vindt u een berekening hoe het per lid wordt berekent. U kunt maar één bedrag per jaar invoeren, als u een bedrag wilt aanpassen kunt u dit doen door hieronder op aanpassen te drukken.</p>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'add') { ?>
                <?php $controller->addBookYearForm(); ?>
            <?php } elseif (isset($_GET['id']) && isset($_GET['action']) && ($_GET['action'] === 'update' || $_GET['action'] === 'view' || $_GET['action'] === 'delete')) { ?>
                <?php if ($_GET['action'] === 'update') { ?>
                    <?php $controller->editBookYearForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'delete') { ?>
                    <?php $controller->deleteBookYearForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'view') { ?>
                    <?php $controller->viewBookYear(); ?>
                <?php } ?>
            <?php } else { ?>
            <a href="./boekjaar.php?action=add">
                <button class="good">Boekjaar toevoegen</button>
            </a>
            <?php $controller->listBookYears(); ?>
            <?php } ?>
        </section>
    <?php include './inc/templates/footer.php'; ?>
</body>
</html>
