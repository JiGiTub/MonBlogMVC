<?php $titre = 'Mon Blog' ?>

<?php ob_start() ?>
<?php foreach ($billets as $billet): ?>
    <article>
         <header>
            <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?> :</h1>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
        <?php
        $requeteCommentaires = 'select COUNT(*) from T_COMMENTAIRE' .
                ' where BIL_ID = ' . $billet['BIL_ID'];
        $stmtCommentaires = $bdd->query($requeteCommentaires);
        $nbComm = $stmtCommentaires->fetchColumn();
        echo '<footer class="commentaire">' . $nbComm . ' commentaire(s)</footer>';
        ?>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>
