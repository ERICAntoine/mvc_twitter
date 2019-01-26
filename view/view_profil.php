<?php include "model/header.php"?>
<div class="mx-auto" style="width: 200px;"></div>
	<div class="container-fluid bg-light">
		<div class="container timeline">
			<div class="row">
				<div class="col-lg-3 d-flex justify-content-center">
					<div class="card shadow-sm p-2 rounded" style="width: 18rem;">
					<?php while($donnes = $profilInfo->fetch(PDO::FETCH_ASSOC)):?>
						<div class="image">
							<img class="images" src="view/assets/images/user.svg" alt="Card image cap">
						</div>
						<div class="card-body">
							<h5 class="card-title"><?= $donnes["pseudo"] ?></h5>
							<p class="card-text flex-text">
								<span class="d-grid">Tweet
									<?= $tweet ?>
								</span>
								<span class="d-grid">Following
									<?= $follower ?>
								</span>
								<span class="d-grid">Followers
									<?= $following?>
								</span>
							</p>
							<p class="card-text"></p>
							<p class="card-text"></p>
							<?php if($checkFollow != false): ?>	
								<input type="submit" name="Follow"  id="follow" value="Following" class="btn btn-danger">
							<?php else: ?>	
								<input type="submit" name="Follow"  id="follow" value="Follow" class="btn btn-primary">
							<?php endif ?>
							<input type="hidden" name="idProfil" value=<?=$donnes['id']?> id="idProfil">
						</div>
					<?php endwhile;?>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="container">
						<form method="post">
							<div class="tweet_area padding shadow-sm p-3 mb-5 rounded">
								<textarea name="content" class="form-control" placeholder="Tweet ici ..."></textarea>
								<input name="post_tweet" type="submit" value="Tweet">
							</div>
						</form>
					</div>
					<div class="container">
						<div class="all_tweet padding shadow-sm p-3 mb-5 rounded">
							<?php while($tweets = $allTweet->fetch(PDO::FETCH_ASSOC)):?>
								<div class="tweet">
									<div class="tweet_photo">
										<img class="images" src="view/assets/images/user.svg"/>
									</div>
									<div class="tweet_describe">
										<span class="pseudo"><?=$tweets["pseudo"]?></span>
										<p><?= $tweets["text"]?></p>
										<span class="date"><?=$tweets["tweet_date"]?></span>
										<div class="interactive d-flex">
											<div class="comments mr-4">
												<img src="view/assets/images/comment.svg"/>
											</div>
											<div class="retweets mr-4">
												<img src="view/assets/images/retweet.svg"/>
											</div>
											<div class="like">
												<img id= "heart" class="heart" value=<?= $tweets["id"]?> src="view/assets/images/like.svg"/>
												<span class="numberLike"><?= $getLike[$incrementLike]?></span>
												<?php $incrementLike++?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="view/assets/js/Follow.js"></script>
	<script src="view/assets/js/tweetInteractive.js"></script>
</body>
</html>