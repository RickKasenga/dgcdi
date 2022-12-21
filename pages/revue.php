
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Revue</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Accueil</a></li>
                        <li><a href="#">Revue</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    
    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <?php
        $revues = get_revues();
        foreach($revues as $revue){
                    ?>
                    <div class="blog-content wow fadeInUp col-lg-6 col-md-12">
                        <div class="item">

                            <div class="blog-item-box">
                                
                                <div class="thumb">
                                 <a href="index.php?page=detail_revue&id=<?= $revue->id ?>">
                                    <img src="assets/img/<?= $revue->image ?>" width="600px" height="400px" alt="Thumb">
                                </a>
                                    <div class="date"><?= date("d/m/Y",strtotime($revue->date_publication)); ?></div>
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                           <li>
                                            
                                               <img src="assets/img/<?= $revue->image ?>" alt="Author">
                                               <span>par </span>
                                               <a href="index.php?page=detail_revue&id=<?= $revue->id ?>"><?= $revue->writer ?></a>
                                           </li>
                                           <li>
                                               <span>à </span>
                                               <a href="index.php?page=detail_revue&id=<?= $revue->id ?>"><?= $revue->lieu ?></a>
                                           </li>
                                       </ul>
                                    </div>
                                    <h3><a href="index.php?page=detail_revue&id=<?= $revue->id ?>"><?= $revue->titre ?></a></h3>
                                    <p  class="text-justify">
                                    <?= substr(nl2br($revue->contenue),0,200) ?>...
                                    <br>
                                    <a href="index.php?page=detail_revue&id=<?= $revue->id ?>">Lire Plus</a>
                                       
                                    </p>
                                                                    
                                    <blockquote>
                                    <?= substr(nl2br($revue->contenue),0,0) ?>...
                                    </blockquote>
                                   
                                    
                                    
                                </div>
                            </div>
                        </div>

                      

                   
                       
                    </div>
                   
                <?php
                    }
                ?>
         </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

  