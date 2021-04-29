<?php get_header(); ?>

    <main>
      <h1>LEE YOGA</h1>
      <p class="subtitle">Posts sobre yoga escritos con mucho amor</p>

      <div class="container-l">
        <ul class="post-list">

        <?php if (have_posts()):  while(have_posts()): the_post(); ?>
        
          <li class="post-item">
            <img class="post-item-image" src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" />
            <div class="post-item-text">
              <a href="<?php the_permalink(); ?>"><h2 class="post-item-title"><?php the_title(); ?></h2></a>
              <p class="post-item-description"><?php the_excerpt(); ?></p>
            </div>
          </li>
        
        <?php endwhile; endif;?>

        </ul>

        <div class="post-pagination">
            <div class="post-pagination-previous"><?php previous_posts_link(); ?></div>
            <div class="post-pagination-next"><?php next_posts_link(); ?></div>

        </div>


      </div>
    </main>

<?php get_footer(); ?>