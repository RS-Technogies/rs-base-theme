<div id="register_associate" class="px-4 py-3 bg-white registration">

    <div class="row">
        <div class="col-12 text-center text-primary">
            <h3 class="title-registration font-bold"><?php echo $title; ?></h3>
        </div>
    </div>
    <ul id="progressbar" class="flex flex-wrap justify-center">
		<?php foreach ( $fields as $f ): ?>
            <li class=" text-primary" id="account"><?php echo isset($f['icons'])?$f['icons']:'' ?> <strong><?php echo $f['title']; ?></strong>
            </li>
		<?php endforeach; ?>
    </ul>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated h-100" role="progressbar" aria-valuemin="0"
             aria-valuemax="100" style="width: 25%;"></div>
    </div>

    <div class="col-md-12">
        <form id="formValidate" data-role="associate" name="formValidate" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="form_id" value="<?php echo $form_id ?>" />
            <input type="hidden" name="nonce" value="<?php echo $nonce ?>" />
            <input type="hidden" name="action" value="custom_form_submit" />
            <div class="contact-message"></div>
				<?php foreach ($fields as $f) {
				   $data['fields']=$f['fields'];
				   $data['form_id']=$form_id;
					renderViewPart( 'form/components/fieldGroup', $data );
				}
				?>


        </form>
    </div>
    <div class="col-md-12">
        <div class="pagination flex flex-wrap justify-between">
            <button class="btn btn-primary previous">Previous</button>
            <button class="btn btn-primary next">Next</button>
        </div>
    </div>
</div>