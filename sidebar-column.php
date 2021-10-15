<div class="columnRight">
    <div class="newColumn">
        <h3 class="columTtl">New Column</h3>
        <?php
            $my_query = new WP_Query( array(
                'post_type' => 'column',
                'posts_per_page' => 5,
                'taxonomy' => 'column_category',
            ));
            if( $my_query->have_posts() ) : ?>
        <ul class="kaku">
            <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="catColumn">
        <h3 class="columTtl">Category</h3>
        <ul class="kaku">
            <?php
            $catargs = array(
                'taxonomy' => 'column_category',
                'hide_empty'=> 1
            );
            $catlists = get_categories( $catargs );
            foreach($catlists as $cat) :
            ?>
            <li><a href="<?php echo home_url('/column_category/' . $cat->slug ); ?>"><?php echo $cat->name; ?> (<?php echo $cat->count; ?>)</a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="yearColumn">
        <h3 class="columTtl">月別アーカイブ</h3>
        <?php
        $year_prev = null;
        $postType = get_post_type( );
        $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                            YEAR( post_date ) AS year,
                                            COUNT( id ) as post_count FROM $wpdb->posts
                                            WHERE post_status = 'publish' and post_date <= now( )
                                            and post_type = '$postType'
                                            GROUP BY month , year
                                            ORDER BY post_date DESC");
        foreach($months as $month):
            $year_current = $month->year;
            if ($year_current != $year_prev) { ?>
                <?php if($year_prev != null): ?>
                    </dl>
                <?php endif; ?>

                <dl class="kaku">
                <dt><?php echo $month->year; ?>年</dt>
                    <dd>
                        <ul>
                    <?php } ?>
                            <li>
                                <a href="<?php echo esc_url(home_url()); ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>?post_type=column">
                                    <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月　(<?php echo $month->post_count; ?>)
                                </a>
                            </li>
                            <?php $year_prev = $year_current; ?>
                <?php endforeach; ?>
                        </ul>
                    </dd>
                </dl>
    </div>
</div>