

<main id="main" class="elements-main" style="margin-bottom: 0px;">







	<section id="article" class="article">




		<div class="article-inner">


			<figure class="article-inner-figure">

				<img src="<?php echo Configure::read('Settings.DOMAIN').$blogPost['BlogPost']['image']; ?>" class="article-inner-image">

			</figure>

			<article class="content article-inner-content">

				<header class="article-inner-content-header">

					<h2 class="article-inner-content-header-title"><?php echo h($blogPost['BlogPost']['title']); ?></h2>

					<h6 class="article-inner-content-header-category">






						<?php echo h($blogPost['BlogPost']['summary']); ?>

					</h6>

				</header>


				<?php echo $blogPost['BlogPost']['body']; ?>

			</article>

		</div>

	</section>







</main>