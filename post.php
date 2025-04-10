<!-- 1. Home Page (front-page.php) -->
<?php
/* Template for the homepage */
get_header();
?>
<main class="home">
  <section class="home__intro container text-center py-5">
    <h1>Welcome to [Destination Name]</h1>
    <p>Explore local experiences, dining, and stays.</p>
  </section>

  <section class="home__featured-activities container py-4">
    <h2>Things To Do</h2>
    <div class="row">
    <?php
    $featured_activities = get_option('featured_activities');
    if ($featured_activities):
      foreach ($featured_activities as $activity_id):
        $post = get_post($activity_id);
        setup_postdata($post);
        ?>
        <div class="col-md-4 home__activity-card">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
        <?php
        wp_reset_postdata();
      endforeach;
    endif;
    ?>
    </div>
  </section>

  <section class="home__featured-accommodations container py-4">
    <h2>Places To Stay</h2>
    <div class="row">
    <?php
    $featured_accommodations = get_option('featured_accommodations');
    if ($featured_accommodations):
      foreach ($featured_accommodations as $acc_id):
        $post = get_post($acc_id);
        setup_postdata($post);
        ?>
        <div class="col-md-4 home__accommodation-card">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
        <?php
        wp_reset_postdata();
      endforeach;
    endif;
    ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>