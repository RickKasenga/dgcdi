<?php
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

?>
<h2>Listing des Revues</h2>
<hr/>

<?php

$revues = get_revue();
foreach($revues as $revue){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?= $revue->titre ?><?php echo ($revue->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= substr(nl2br($revue->contenue),0,1200) ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="../assets/img/<?= $revue->image ?>" class="materialboxed responsive-img" alt="<?= $revue->titre ?>"/>
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="index.php?page=post_revue&id=<?= $revue->id ?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}