<div class="fdbksec py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-11">
				<h2 class="pg-title-big text-center">Rating & Reviews</h2>
				<div class="row">
					<?php if(!empty($all_reviews)){  foreach($all_reviews as $review){ ?>
					<div class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<div class="d-flex">
										<?php $uname = 'Anonymous'; if($review->user_id!=''){ $user = get_user($review->user_id); $uname = $user['full_name']; }  ?>
										<span class="rwsnbg text-center rounded-circle fw-bold fs-5"><?php $words = explode(" ", $uname);
										  $acronym = "";
										  foreach ($words as $w) {
											$acronym .= $w[0];
										  } echo$acronym; ?></span>
										<div>
											<div class="rwnm fw-bold fs-6"><?= $uname; ?></div>
											<div class="rwdt text-gray"><?= date('d-M-Y',strtotime($review->date_publish)); ?></div>
										</div>
									</div>
									<div class="rwcb mb-2">
										<span class="badge <?php if($review->stars >= '2.5'){ echo'bg-success'; }elseif($review->stars <= '2'){ echo'bg-danger'; };?> fw-bold me-2"><?= $review->stars; ?>/5</span>
										<?php
										echo "<span class='strrw'>";
										for ( $i = 1; $i <= 5; $i++ ) {
											if ( round($review->stars - .25 ) >= $i ) {
												echo "<i class='bi bi-star-fill'></i>";
											} elseif ( round( $review->stars + .25 ) >= $i ) {
												echo "<i class='bi bi-star-half'></i>";
											} else {
												echo "<i class='bi bi-star'></i>";
											}
										}
										echo '</span>';?>
									</div>
								</div>
								<p class="mb-0"><?= $review->message; ?></p>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>				
			</div>
		</div>
	</div>
</div>