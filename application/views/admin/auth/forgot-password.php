<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?= base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?> - <?= $site_name; ?></title>
    <?php if($site_favicon!=NULL) { ?>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>uploads/site/<?= $site_favicon; ?>">
    <?php }else { ?>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/images/favicon.png">
    <?php } ?>
	
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/mulish.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/toast/jquery.toast.min.css">
	<link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>

<body class="lgn-bg d-flex align-items-center">
   <main class="d-flex w-100">
         <div class="container d-flex flex-column">
            <div class="row vh-100">
               <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                  <div class="d-table-cell align-middle">
                    <div class="card shadow lgn-card border-0">
                        <div class="card-body">
						<div class="m-sm-4">
                            <div class="text-center mb-3">
                                <?php if($site_logo!=NULL) { ?>
                                    <img src="<?= base_url(); ?>uploads/site/<?= $site_logo ?>" alt="<?= $site_name ?>" class="img-fluid llogo" >
                                <?php }else { ?>
                                    <img src="<?= base_url(); ?>assets/images/admin-logo.png" alt="<?= $site_name ?>" class="img-fluid llogo" >
                                <?php } ?>
                            </div>
                            <h5 class="lttl mb-3"><?= $this->lang->line("text_forgot_password_link"); ?></h5>
                            <form id="forgotPasswordForm" method="POST" class="form-signin">
                                <div class="mb-4">
                                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="<?= $this->lang->line("text_enter_email"); ?>"
                                         autofocus="">
                                </div>
								<div class="d-grid mb-3">
									<button id="forgotPasswordButton" class="btn btn-primary" type="submit"><span class="ladda-label"><?= $this->lang->line("text_send_reset_link"); ?></span></button>
								</div>
							</form>
							<div class="text-center">
                            <?= $this->lang->line("text_backto"); ?> <a class="bkhlnk" href="<?= base_url(); ?>admin/login"><?= $this->lang->line("text_login"); ?></a>
                        </div>
                        </div>
						</div>
                        
                    </div>
                   </div>
                    </div>
                  </div>
               </div>
      </main>

   <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/toast/jquery.toast.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/admin/auth.js"></script>
	
    <script src="<?= base_url(); ?>assets/js/admin/auth.js"></script>
</body>

</html>