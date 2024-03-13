<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() || comments_open() ) : ?>
<div class="single-comments-section blg-single">
    <?php if ( have_comments() ) : ?>
        <h2 class="heading-2"><?php comments_number( esc_html__('0 Comments', 'logtra'), esc_html__('1 Comment', 'logtra'), esc_html__('% Comments', 'logtra') ); ?></h2>
        <div class="single-commentor">
            <ul>
                <?php wp_list_comments('callback=logtra_theme_comment'); ?>
            </ul>
        </div>
        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
            <div class="pagination_area">
                <nav>
                    <ul class="pagination">
                        <li> <?php paginate_comments_links( 
                              array(
                              'prev_text' => wp_specialchars_decode( '<i class="fa fa-angle-left"></i>',ENT_QUOTES),
                              'next_text' => wp_specialchars_decode( '<i class="fa fa-angle-right"></i>',ENT_QUOTES),
                              ));  ?>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    <?php endif; ?>           
    <?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $comment_args = array(
                'id_form' => '',        
                'class_form' => '',                         
                'title_reply'=> esc_html__( 'Leave A Comment', 'logtra' ),
                'title_reply_before' => '<h2 class="heading-2">',
                'title_reply_after'  => '</h2>',
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<div class="row g-5 top-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-style-2" name="author" placeholder="'.esc_attr__('Full Name', 'logtra').'" required="'.esc_attr__('required', 'logtra').'" data-error="'.esc_attr__('Name is required.', 'logtra').'">
                                        </div>
                                    </div>',
                    'email' => '    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control input-style-2" name="email" placeholder="'.esc_attr__('Email Address', 'logtra').'" required="'.esc_attr__('required', 'logtra').'" data-error="'.esc_attr__('Valid email is required.', 'logtra').'">
                                        </div>
                                    </div>
                                </div>',           
                ) ),   
                'comment_field' => '<div class="row g-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control input-style-2" rows="5" placeholder="'.esc_attr__('Write a comment...', 'logtra').'" required="'.esc_attr__('required', 'logtra').'" data-error="'.esc_attr__('Please,leave us a message.', 'logtra').'"></textarea>
                                        </div>',
                'label_submit' =>   esc_html__( 'Post A Comment', 'logtra' ),
                'submit_button' =>  '<button name="submit" type="submit" class="btn-1 btn-md mt-30">
                                        '.esc_attr__('%4$s', 'logtra').'
                                    </button>',
                'submit_field' =>esc_attr__('%1$s', 'logtra').' '.esc_attr__('%2$s', 'logtra').'
                                    </div>
                                </div>',
                'comment_notes_before' => '',
                'comment_notes_after' => '',             
            )
        ?>
        <?php if ( comments_open() ) : ?>
        <div class="single-comments-section-form mt-30">
            <?php comment_form($comment_args); ?>
        </div>
    <?php endif; ?> 
</div>
<?php endif; ?>    
