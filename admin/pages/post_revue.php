<?php

    if(admin()!=1){
        header("Location:index.php?page=dashboard");
    }


    $revue = get_post_revue();
    if($revue == false){
        header("Location:index.php?page=error");
    }

?>
</div>

    <div class="parallax-container">
        <div class="parallax">
            <img src="../assets/img/<?= $revue->image ?>" alt="<?= $revue->titre ?>"/>
        </div>
    </div>
<div class="container">

    <?php

        if(isset($_POST['submit'])){
            $title = htmlspecialchars(trim($_POST['titre']));
            $content = htmlspecialchars(trim($_POST['contenue']));
            $posted = isset($_POST['public']) ? "1" : "0";
            $errors = [];

            if(empty($title) || empty($content)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }

            if(!empty($errors)){
                ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            }else{
                
                edit($title,$content,$posted,$_GET['id']);
                ?>
                    <script>
                        window.location.replace("index.php?page=list");
                    </script>
                <?php
            }


        }


    ?>


    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="titre" id="title" value="<?= $revue->titre ?>"/>
                <label for="title">Titre du revue</label>
            </div>
            <div class="input-field col s12">
                <textarea id="content" name="contenue" class="materialize-textarea"><?= $revue->contenue ?></textarea>
                <label for="content">Contenu du revue</label>
            </div>

            <div class="col s6">
                <p>Public</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo ($revue->posted == "1")?"checked" : "" ?>/>
                        <span class="lever"></span>
                        Oui
                    </label>
                </div>
            </div>

            <div class="col s6 right-align">
                <br/><br/>
                <button type="submit" class="btn" name="submit">Modifier l'article</button>

            </div>


        </div>



    </form>