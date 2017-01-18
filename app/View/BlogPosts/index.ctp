

<section class="featured_articles featured_articles--home">

	<div class="featured_articles-inner content ng-scope" scroll-item="" scroll-key="slidedown" id="scrollItem8" style="transform: matrix(1, 0, 0, 1, 0, -64);">


		<h6 class="featured_articles-suptitle">Articles</h6>


		<!-- Link to Articles Page -->

		<a href="#" class="featured_articles-link">

			<h2 class="featured_articles-title">
				<span>BREW GUIDES AND MORE</span>
			</h2>

		</a>

		<icon src="https://us.camposcoffee.com/wp-content/themes/campos-wp-theme/assets/images/icons/big-arrow.svg" class="featured_articles-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="17px" viewBox="0 0 21 17" version="1.1" class="injected-svg icon-svg">

				<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
					<g id="BigArrow_Beige" transform="translate(1.000000, 1.000000)" stroke-width="2">
						<g>
							<polyline class="arrow-points" id="arrow" transform="translate(15.000000, 7.500000) rotate(-90.000000) translate(-15.000000, -7.500000) " points="22 4 15 11 8 4"></polyline>
							<path d="M17.5,7 L0.5,7" id="Line"></path>
						</g>
					</g>
				</g>
			</svg></icon>

	</div>

	<ul class="featured_articles-list ng-scope" scroll-item="" scroll-key="" scroll-offset="0.75" id="scrollItem9">


		<?php foreach ($blogPosts as $blogPost): ?>
		<li class="featured_articles-list-item">

			<a href="<?php echo Configure::read('Settings.DOMAIN').'/BlogPosts/view/'.$blogPost['BlogPost']['slug'] ;?>" class="card-link">

				<figure class="card-figure">

					<div style="background-image: url(&#39;<?php echo Configure::read('Settings.DOMAIN').$blogPost['BlogPost']['image']; ?>&#39;);" class="card-figure-image"></div>

				</figure>

				<div class="content card-content">

					<icon src="" class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="17px" viewBox="0 0 21 17" version="1.1" class="injected-svg icon-svg">

							<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
								<g id="BigArrow_Beige" transform="translate(1.000000, 1.000000)" stroke-width="2">
									<g>
										<polyline class="arrow-points" id="arrow" transform="translate(15.000000, 7.500000) rotate(-90.000000) translate(-15.000000, -7.500000) " points="22 4 15 11 8 4"></polyline>
										<path d="M17.5,7 L0.5,7" id="Line"></path>
									</g>
								</g>
							</g>
						</svg></icon>

					<h4 class="card-title"><span><?php echo h($blogPost['BlogPost']['title']); ?></span></h4>

					<h6 class="card-subtitle">



						<?php echo h($blogPost['BlogPost']['summary']); ?>

					</h6>

				</div>

			</a>

		</li>
		<?php endforeach; ?>





	</ul>

</section>