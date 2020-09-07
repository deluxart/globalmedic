<div class="post-form-block" style="margin-bottom: <?php block_field( 'margin-bottom' ); ?>px">
	<div class="content">
		<div class="post-form-title"><?php block_field( 'title' ); ?></div>
				<div class="post-form-reg">
					<div class="post-tel-reg">
						<p class="post-tel-reg-title">Звоните по телефонам:</p>
						<p class="post-tel-reg-phone"><a style="color: #b1e21c;" href="tel:<?php block_field( 'phone-1' ); ?>"><?php block_field( 'phone-1' ); ?></a></p>
						<p class="post-tel-reg-phone"><a class="binct-phone-number-1" style="color: #b1e21c;" href="tel:<?php block_field( 'phone-2' ); ?>"><?php block_field( 'phone-2' ); ?></a></p>
					</div>
					<div class="post-btn-reg">
						<p class="post-btn-reg-title">Или заполните форму:</p>
						<div class="classic-btn"><a href="#" data-toggle="modal" class="sg-show-popup" data-target="#<?php block_field( 'id-modal' ); ?>">Регистрация</a></div>
						
						
					</div>
				</div>
				<div class="bottom-post-form-text"><?php block_field( 'end-text' ); ?></div>
	</div>
</div>

<!-- Модалка -->
<div class="modal fade" id="<?php block_field( 'id-modal' ); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title reviews_name" id="exampleModalCenterTitle"><?php block_field( 'title-modal' ); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

			</div>
			<div class="modal-body sg-popup-content"><?php block_field( 'content-modal' ); ?></div>
		</div>
	</div>
</div>