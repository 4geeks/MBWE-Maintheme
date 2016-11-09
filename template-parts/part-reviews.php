<div id="reviewscontainer" class="container-fluid reviewscontainer">
	<?php if($reviewSummary and $reviewSummary != ''){ ?>
	<div itemscope="" itemtype="http://schema.org/Review" id="review">
		<div id="review-title" class="row">
			<div class="col-sm-12">
				<h5 itemprop="itemReviewed" itemscope="" itemtype="http://schema.org/Thing"><span itemprop="name"><?php echo $name; ?></span>'s reviews</h5>
				<span itemprop="author" itemscope="" itemtype="http://schema.org/Person"><meta itemprop="name" content=""></span>
			</div>
		</div>
		<div class="row aggregated-score-title" itemprop="description">
			<div class="col-sm-9">
				<p><strong>Aggregated score</strong></p>
				<p>The aggregated rating  was compiled from multiple sources (WeddingWire, Facebook, Yelp, Google, etc.), including merchants, third party aggregators, editorial sites and users. Collected from all reviews total across all sources.</p>
			</div>
			<div id="agregated-score" class="col-sm-3 review-starts-container">
				<?php 
				$reviewScore = getReviewAverage([$facebookScore, $googleScore, $yelpScore, $weddingwireScore, $theknotScore]); 
				?>
				<span><?php echo $reviewScore; ?></span>
				<?php echo printStars(round($reviewScore,1)); ?>
			</div>
		</div>
		<span itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
			<meta itemprop="ratingValue" content="5.0">
			<meta itemprop="bestRating" content="5">
		</span>
		<div class="row">
			<div class="col-sm-6">
				<h2>The Pro's</h2>
				<p><?php echo $thepros; ?></p>
				<h2>The Con's</h2>
				<p><?php echo $thecons; ?></p>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<h2>The Bottom Half</h2>
						<p><?php echo $reviewSummary; ?></p>
					</div>
				</div>
				<?php if($facebookScore and $facebookScore != ''){ ?>
				<div class="row socialmedia-review firstreview">
					<div class="col-xs-6">
						<span>Facebook</span>
					</div>	
					<div class="col-xs-6 review-starts-container start">
						<?php echo printStars($facebookScore); ?>
					</div>
				</div>
				<?php } ?>
				<?php if($googleScore and $googleScore != ''){ ?>
				<div class="row socialmedia-review">
					<div class="col-xs-6">
						<span>Google</span>
					</div>	
					<div class="col-xs-6 review-starts-container start">
						<?php echo printStars($googleScore); ?>
					</div>
				</div>
				<?php } ?>
				<?php if($yelpScore and $yelpScore != ''){ ?>
				<div class="row socialmedia-review">
					<div class="col-xs-6">
						<span>Yelp</span>
					</div>	
					<div class="col-xs-6 review-starts-container start">
						<?php echo printStars($yelpScore); ?>
					</div>
				</div>
				<?php } ?>
				<?php if($weddingwireScore and $weddingwireScore != ''){ ?>
				<div class="row socialmedia-review">
					<div class="col-xs-6">
						<span>Wedding Wire</span>
					</div>	
					<div class="col-xs-6 review-starts-container start">
						<?php echo printStars($weddingwireScore); ?>
					</div>
				</div>
				<?php } ?>
				<?php if($theknotScore and $theknotScore != ''){ ?>
				<div class="row socialmedia-review lastreview">
					<div class="col-xs-6">
						<span>The Knot</span>
					</div>	
					<div class="col-xs-6 review-starts-container start">
						<?php echo printStars($theknotScore); ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } else { ?>
		<div class="text-center">
			<h5><?php echo $name; ?>'s online reviews are still being procesed by our team, please come back in a few days. </h5>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
		<div>
	<?php } ?>
</div>

<?php

function printStars($decimalPoints)
{
	$decimalPoints = floatval($decimalPoints);
	$resultStr = '';
	$integerPoints = floor( $decimalPoints );

	for($i = 0; $i<$integerPoints; $i++){
		$resultStr .= '<i class="fa fa-star" aria-hidden="true"></i>';
	}

	if($decimalPoints != $integerPoints) $resultStr .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';

	for($i = 0; $i<5-ceil($decimalPoints); $i++){
		$resultStr .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
	}

	return $resultStr;
}
function getReviewAverage($arrayOfReviews)
{
	$reviewSum = 0;
	$cont = 0;
	foreach ($arrayOfReviews as $review) {
		if($review and $review!='')
		{
			$reviewSum += floatval($review);
			$cont++;
		} 
	}

	return ($reviewSum / $cont);
}

?>