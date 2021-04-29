<?php get_header(); ?>

<?php

if (have_posts()):  while(have_posts()): the_post(); ?>


<main>
  

    <div class="container-l">
            <h1 class="post-title"><?php the_title();?></h1>
                   
            <div class="page-content">
                <?php the_content(); ?>
            </div>

    </div>

</main>


<?php endwhile; endif;?>




</main>


<?php get_footer(); ?>