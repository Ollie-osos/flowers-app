<?php
/**
* Template Name: FAQs
*
*/
// if(get_field('page_colour')){
//     $page_colour = get_field('page_colour');
// }else{
//     $page_colour = 'pink';
// }

// get_header(null, array('page_colour' => $page_colour )); ?>

<div class="page">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();


