<?php

$revue = get_revue();
if($revue == false){
    header("Location:index.php?page=erreurs");
}else{
    ?>
       <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                        <div class="item">

                            <div class="blog-item-box">
                                
                                <div class="thumb">
                                    <a href="#"><img src="assets/img/<?= $revue->image ?>"  alt="Thumb"></a>
                                    <div class="date"><?= date("d/m/Y à H:i",strtotime($revue->date_publication)); ?></div>
                                </div>
                               
                                    <h3><?= $revue->titre ?></h3>
                                    <p>
                                    <?= $revue->contenue ?>
                                    </p>
                                    

                                    
                                </div>
                            </div>
                        </div>


                     

                        <!-- Start Blog Comment -->
                        <div class="blog-comments">
                            <div class="comments-area">
                                <div class="comments-title">
                                    <h3>Commentaires</h3>
                                    <?php
                                            $responses = get_comments();
                                            if($responses != false){
                                                foreach($responses as $response){
                                                    ?>
                                                          <div class="comments-list">
                                        <div class="commen-item">
                                            <div class="avatar">
                                                <img src="assets/img/800x800.png" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5><?= $response->name ?> <span class="reply"><a href="#"><i class="fas fa-reply"></i> Repondre </a></span></h5>
                                                    <span><?= date("d/m/Y", strtotime($response->date)) ?></span>
                                                </div>
                                                <p>
                                                <?= $response->comment ?> 
                                                  </p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                                    <?php
                                                }
                                            }else echo "Aucun commentaire n'a été publié... Soyez le premier!";
                                     ?>

                                  
                                </div>

            <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = [];

                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "L'adresse email n'est pas valide";
                        }
                    }


                    if(!empty($errors)){
                        ?>
                            
                                    <?php
                                        foreach($errors as $error){
                                            echo $error."<br/>";
                                        }
                                    ?>
                               
                        <?php
                    }else{
                        comment($name,$email,$comment);
                        ?>
                            <script>
                                window.location.replace("index.php?page=detail_revue&id=<?= $_GET['id'] ?>");
                            </script>
                        <?php
                    }

                }

            ?>




                                <div class="comments-form">
                                    <div class="title">
                                        <h3>Laissez un commentaire</h3>
                                    </div>
                                    <form  class="contact-comments" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Name -->
                                                    <input name="name" class="form-control" placeholder="Nom *" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Email -->
                                                    <input name="email" class="form-control" placeholder="Email *" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <!-- Comment -->
                                                    <textarea class="form-control" placeholder="Comment" name="comment"></textarea>
                                                </div>
                                                <div class="form-group full-width submit">
                                                    <button class="btn-animation dark border" type="submit" name="submit">Commenter ce revue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Comments Form -->

                    </div>
                </div>
            </div>
        </div>
<?php
}
?>

    