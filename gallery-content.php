<div id="page-content">
    <section class="page-content">
        <div class="section-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div id="gallery" class="gallery">
                            <?php if(is_single()): the_content(); ?>
                            <?php else: ?>
                                <?php $count = 0; ?>
                                <div class="row">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <?php

                                        $link = get_permalink($post->ID);
                                        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
                                        $imgStyle = "width: $img[1]px; height: $img[2]px; background-size: $img[1]px $img[2]px; background-image:url($img[0]);";
                                        $postTerms = get_the_terms($post->ID,'gallery');
										$class = '';
										$ratio = $img[2] / $img[1] * 100;
                                        foreach($postTerms as $term){
                                            $class .= ' '.$term->slug;
                                        }
                                        if($count > 0 && $count % 4 === 0){
                                            echo '</div><div class="row">';
                                        }
                                        ?>
                                        <div class="col-md-3 gallery-item <?php echo $class; ?>">
                                            <a href="<?php echo $link; ?>">
												<div class="gallery-item-inner">
													<?php if ($img[0]) : ?>
														<div class="thumb">
															<div style="padding-top: <?php echo $ratio; ?>%; width: 100%;"></div>
															<img src="<?php echo $img[0]; ?>"/>
														</div>
													<?php else: ?>
														<div style="background-color: rgb(89, 172, 156); height: 100%; width: 100%;"></div>
													<?php endif; ?>
													<div class="overlay">
														<div class="vertical-center-wrapper">
															<div class="vertical-center">
																<p class="text"><?php echo $post->post_title; ?></p>
															</div>
														</div>
													</div>
												</div>
                                                <p class="text"><?php echo $post->post_title; ?></p>
                                            </a>
                                        </div>
                                        <?php $count = $count + 1; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
