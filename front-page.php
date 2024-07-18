<?php get_header()?>
<!-- BANNER -->
  <section class="banner">
      <div class="container">
        <div class="banner__wrapper">
          <h1>The Blog</h1>
          <div class="banner__grid">
            <div class="banner__main">
                <?php  
                $main = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'meta_key' => 'grouping',
                    'meta_value' => 'banner-main'
                ))
                ?>
                <?php if($main->have_posts()) : while($main->have_posts()) :$main->the_post() ?>
              <article class="banner__story">
                <?php 
                if(has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
                <div class="banner__story__content">
                  <small><?php the_date() ?></small>
                  <h2><?php the_title() ?></h2>
                  <?php echo wp_trim_words(get_the_excerpt(),25) ?>
                  <a href="<?php the_permalink() ?>">Read More...</a>
                </div>
              </article>
                <?php 
                    endwhile;
                else:
                    echo "No post";
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="banner__sidebar">
                <?php 
                    $aside = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'meta_query' => array(
                            array(
                                'key' => "grouping",
                                'value' => "banner-side",
                                'compare' => "="
                            )
                        )
                    ))
                ?>
                <?php if($aside->have_posts()) : while($aside->have_posts()) : $aside->the_post()?>
              <div class="card__sm">
                <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('', array(
                            'class' => 'img-sm',
                            'alt' => get_the_title()
                        ));
                    }
                ?>
                <div class="card__sm__content">
                  <small><?php echo get_the_date('M j, Y')?> </small>
                  <h3><?php echo get_the_title() ?></h3>
                  <a href="<?php the_permalink()?>">Read More...</a>
                </div>
              </div>
              <?php 
                    endwhile;
                else : 
                    echo "No More Post";
                endif;
                
                ?>
            </div>
          </div>
        </div>
      </div>
  </section>
<!-- LATEST -->
  <section class="latest">
      <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__wrapper">

        <?php $latest = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_query' => array(array(
                'key' => 'grouping',
                'value' => "latest",
                'compare' => "="
            ))
        )) ?>

        <?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post() ?>
          <div class="card__md">
                <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('', array(
                            'alt' => get_the_title()
                        ));
                    }
                ?>
            <div class="card__md__content">
              <ul>
                <li><small><?php echo get_the_date()?></small></li>
                <li><small><?php echo get_the_category($id)[0]->name?></small></li>
              </ul>
              <h3>
                <?php the_title()?>
              </h3>

              <p>
              <?php echo wp_trim_words(get_the_content(),20)?>
              </p>
              <a href="<?php the_permalink()?>">Read More...</a>
            </div>
          </div>
        <?php endwhile;
        else:
            echo "No more posts";
        endif;
            wp_reset_postdata();   
           ?>
        </div>
      </div>
  </section>
<!-- FEATURE -->
  <section class="feature">
      <div class="feature__content">
      <?php  
            $fmain = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'meta_key' => 'grouping',
                'meta_value' => 'feature-main'
            ));
        ?>
        <?php if($fmain->have_posts()) : while($fmain->have_posts()) : $fmain->the_post()?>
        <h2>Featured New</h2>
        <h3 class="block__header">
            <?php the_title() ?>
        </h3>
        <p><?php echo wp_trim_words(get_the_content(),20)?></p>
      </div>

      <div class="container">
        <div class="feature__img">
        <?php 
                if(has_post_thumbnail()) {
                    the_post_thumbnail();
                }
        ?>
        </div>
        <?php 
                    endwhile;
                else:
                    echo "No post";
                endif;
                wp_reset_postdata();
          ?>
      </div>


      <div class="container">
        <div class="feature__wrapper">
        <div class="feature__main">
        <?php  
            $fleft = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'meta_key' => 'grouping',
                'meta_value' => 'feature-left'
            ));
        ?>
        <?php if($fleft->have_posts()) : while($fleft->have_posts()) : $fleft->the_post()?>
          
            <article class="card__lg">
            <?php 
                if(has_post_thumbnail()) {
                    the_post_thumbnail();
                }
            ?>
              <div class="card__lg__content">
                <small><?php echo get_the_date()?></small>
                <h3>
                  <?php the_title()?>
                </h3>
                <p>
                  <?php echo wp_trim_words(get_the_content(),20)?>
                </p>

                <a href="<?php the_permalink() ?>">Read More...</a>
              </div>
            </article> 
            <?php 
                    endwhile;
                else:
                    echo "No post";
                endif;
                wp_reset_postdata();
            ?>
          </div>
         

          <div class="feature__sidebar">
          <?php 
                    $fright = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'meta_query' => array(
                            array(
                                'key' => "grouping",
                                'value' => "feature-right",
                                'compare' => "="
                            )
                        )
                    ))
                ?>
            <?php if($fright->have_posts()) : while($fright->have_posts()) : $fright->the_post()?>
            <div class="card__mini">
              <small><?php echo get_the_date()?></small>
              <h4>
                <?php echo wp_trim_words(get_the_content(),20)?>
              </h4>
            </div>
            <?php 
                endwhile;
                else:
                    echo "No post";
                endif;
                wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
  </section>

  <?php get_footer()?>

   







