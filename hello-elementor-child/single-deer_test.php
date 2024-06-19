<?php
/*
Template Name: Deer Tests Page
*/

get_header();

$args = array(
    'post_type' => 'deer_test',
    'posts_per_page' => -1
);

$deer_tests_query = new WP_Query($args);

if ($deer_tests_query->have_posts()) : 
    while ($deer_tests_query->have_posts()) : $deer_tests_query->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php 
                // Display custom fields
                $start_date = get_post_meta(get_the_ID(), '_start_date', true);
                $end_date = get_post_meta(get_the_ID(), '_end_date', true);
                $description = get_post_meta(get_the_ID(), '_description', true);
                $cover_image = get_post_meta(get_the_ID(), '_cover_image', true);
                $application_link = get_post_meta(get_the_ID(), '_application_link', true);

                if ($cover_image) {
                    echo '<div class="cover-image"><img src="' . esc_url($cover_image) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
                }
                ?>

                <div class="deer-test-details">
                    <p><strong>Start Date:</strong> <?php echo esc_html($start_date); ?></p>
                    <p><strong>End Date:</strong> <?php echo esc_html($end_date); ?></p>
                    <p><strong>Description:</strong></p>
                    <p><?php echo esc_html($description); ?></p>
                    <p><a href="<?php echo esc_url($application_link); ?>" target="_blank">Apply Here</a></p>
                </div>
            </div>
        </article>
    <?php endwhile; 
    wp_reset_postdata();
else : 
    echo '<p>No Deer Tests found.</p>';
endif;

get_footer();
?>