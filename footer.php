      <footer>
				<div class="row" role="complementary">
					<?php dynamic_sidebar("Footer"); ?>
				</div>
				
				<div class="row" role="navigation">
					<?php
						wp_nav_menu( array(
							'menu'              => 'utility',
							'theme_location'    => 'utility',
							'depth'             => 1,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'utility-navbar-collapse',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				</div>
				
				<div class="row" role="contentinfo">
					<div class="col-sm-12 text-center">
						<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
					</div>
				</div>
				
			</footer>

    </div> <!-- /container -->

    <?php wp_footer(); ?>
  </body>
</html>