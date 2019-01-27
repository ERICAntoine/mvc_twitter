<?php include "model/header.php"?>

	<div class="mx-auto" style="width: 200px;"></div>
	<div class="container-fluid bg-light">
		<div class="container timeline">
			<div class="row">
				<div class="col-lg-3 d-flex justify-content-center">
					<div class="card shadow-sm p-2 rounded" style="width: 18rem;">
						<div class="image">
							<?php if(file_exists("userImages/" . $_SESSION['id'] . '/profil.jpg')):?>
                        		<img class="images" src="userImages/<?= $_SESSION['id']?>/profil.jpg" alt="user">
                    		<?php else:?>
                        		<img class="images" src="view/assets/images/user.svg" alt="user">
                    		<?php endif;?>
						</div>
						<div class="card-body">
							<h5 class="card-title"><a href="?c=profil&pseudo=<?= $_SESSION["id"]?>"><?= $_SESSION["pseudo"]?></a></h5>
							<p class="card-text flex-text">
								<span class="d-grid">Tweet
									<?php include "script/nbtweet.php" ?>
								</span>
								<span class="d-grid">Following
									<?php include "script/following.php"?>
								</span>
								<span class="d-grid">Followers
									<?php include "script/followers.php"?>
								</span>
							</p>
							<p class="card-text"></p>
							<p class="card-text"></p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="container">
						<form method="post">
							<div class="tweet_area padding shadow-sm p-3 mb-5 rounded">
								<textarea id="textareatweet" name="content" class="form-control" placeholder="Tweet ici ..."></textarea>
								<div id="sugges" class="suggestion"></div>
								<input id="sub_tweet" type="submit" value="Tweet" name="post_tweet">
							</div>
						</form>
					</div>
					<div class="container">
						<div class="all_tweet padding shadow-sm p-3 mb-5 rounded">
							<div class="loading d-flex justify-content-center">
								<div class="spinner-border text-primary d-flex justify-content-center" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="view/assets/js/tweet.js"></script>
	<script src="view/assets/js/timeline.js"></script>
</body>
</html>