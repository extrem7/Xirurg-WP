<div class="col-lg-3">
    <aside class="category-list">
        <ul class="category-menu">
			<?
			$cat     = get_queried_object()->slug;
			$types   = get_terms( 'type', [ 'hide_empty' => false ] );
			$current = null;
			foreach ( $types as $type ):
				if ( is_single() ) {
					$cat = get_the_terms( $post, 'type' )[0]->slug;
				}
				$current = $cat == $type->slug;
				$link    = get_field( 'ссылка', $type );
				?>
                <li class="<?= $current ? 'active active-category' : '' ?>"><a
                            href="<?= $link ? get_permalink( $link ) : get_term_link( $type ) ?>"><?= $type->name ?></a>
					<?
					if ( ! $link ):?>
                        <ul class="sub-menu">
							<?
							$subMenu     = get_posts( [
								'post_type' => 'operation',
								'tax_query' => [
									[
										'taxonomy' => 'type',
										'field'    => 'term_id',
										'terms'    => $type->term_id,
									]
								]
							] );
							$operationId = get_the_ID();
							foreach ( $subMenu as $post ):?>
                                <li class="<?= is_single() && $operationId == get_the_ID() ? 'sub-active' : '' ?>"><a
                                            href="<? the_permalink() ?>"><? the_title() ?></a></li>
							<? endforeach;
							wp_reset_query() ?>
                        </ul>
					<? endif; ?>
                </li>
			<? endforeach; ?>
        </ul>
    </aside>
</div>