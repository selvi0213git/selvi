<?php
/* Show Add new topic link. */
if ( current_user_can( 'access_topic_form' ) ) : ?>
	<div class="checathlon-add-new-topic">
		<p>
			<?php echo '<a href="#mb-topic-form" class="checathlon-add-new-topic button">' . esc_html__( 'Add new topic', 'checathlon' ) . '</a>'; ?>
		</p>
	</div>
<?php endif; ?>

<?php do_action( 'mb_loop_topic_before' ); ?>

<?php if ( mb_topic_query() ) : // If there are any topics to show. ?>

	<?php while ( mb_topic_query() ) : // Loop through the topics. ?>

		<?php mb_the_topic(); // Sets up the topic data. ?>

			<article <?php post_class(); ?>>

				<div class="entry-inner">

					<h2 class="entry-title"><?php mb_topic_link(); ?></h2>

					<div class="mb-topic-meta">
						<ul>
							<li><?php printf( __( 'Started by %s', 'checathlon' ), mb_get_topic_author_profile_link() ); ?></li>
							<li><?php mb_topic_date(); ?> <?php mb_topic_time(); ?></li>
							<li><?php printf( __( 'Replies: %s', 'checathlon' ), mb_get_topic_reply_count() ); ?></li>
							<li><?php printf( __( 'Voices: %s', 'checathlon' ), mb_get_topic_voice_count() ); ?></li>
							<li><?php _e( 'Latest reply:', 'checathlon' ); ?> <?php mb_topic_last_poster(); ?> <a href="<?php mb_topic_last_post_url(); ?>"><?php mb_topic_last_active_time(); ?></a></li>
							<?php if ( ! empty( mb_topic_states() ) ) : ?>
								<li><?php mb_topic_states(); ?></li>
							<?php endif; ?>
						</ul>
					</div><!-- .mb-topic-meta -->

				</div><!-- .entry-inner -->
			</article><!-- .mb-loop-topic -->

	<?php endwhile; // End topics loop. ?>

	<?php do_action( 'mb_loop_topic_after' ); ?>

	<?php mb_loop_topic_pagination(); ?>

<?php endif; // End check for topics.
