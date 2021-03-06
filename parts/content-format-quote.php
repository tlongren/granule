<?php
/**
 * Quote Content Template Partial
 *
 * Used to display quote post format on archive pages.
 *
 * Will display the first blockquote found on the page. If no blockquote is
 * found then will display entire post.
 *
 * Uses `parts/content.php` as a fallback if no quotes are found.
 *
 * @package Granule
 * @subpackage TemplatePart
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

	$content = get_the_content();

	preg_match( '/<blockquote>(.*?)<\/blockquote>/s', $content, $matches );

	if ( ! empty( $matches[1] ) ) {

		$content = $matches[1];

	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<blockquote>

		<?php echo wp_kses_post( wpautop( $content ) ); ?>

		<span class="permalink">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php echo esc_html_x( '#', 'A symbol used to link to a blog post', 'granule' ); ?>
				<span class="screen-reader-text">
<?php
	/* Translators: %s: Post title */
	printf( esc_html__( 'Permanent link to %s', 'granule' ), get_the_title() );
?>
				</span>
			</a>
		</span>

	</blockquote>

</article><!-- #post-<?php the_ID(); ?> -->
