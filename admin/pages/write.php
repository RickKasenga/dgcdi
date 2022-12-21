<?php
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

?>

<h2>Poster une nouvelle revue</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['titre']));
        $lieu = htmlspecialchars(trim($_POST['lieu']));
        $content = htmlspecialchars(trim($_POST['contenue']));
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = [];

        if(empty($title) || empty($content)){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image'] = "Cette image n'est pas valable";
            }
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
            post($title,$content,$lieu,$posted);
            if(!empty($_FILES['image']['name'])){
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?page=post_revue&id=".$id);
            }
        }
    }


?>


<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="titre" id="title"/>
            <label for="title">Titre du revue</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="lieu" id="lieu"/>
            <label for="lieu">Lieu</label>
        </div>

        <div class="input-field col s12">
            <textarea name="contenue" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu du revue</label>
        </div>
        <div class="col s12">
        <div class="file-field input-field">
            <div class="btn">
                <span>Image du revue</span>
                <input type="file" name="image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
    </div>
        </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

    </div>



</form>