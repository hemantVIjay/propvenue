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
                                    <img src="<?= base_url(); ?>uploads/site/<?= $site_logo ?>" alt="<?= $site_name ?>" class="img-fluid llogo">
                                <?php }else { ?>
                                    <img src="<?= base_url(); ?>assets/images/logo.svg" alt="<?= $site_name ?>" class="img-fluid llogo">
                                <?php } ?>
                            </div>
                            <h5 class="lttl mb-3"><?= $this->lang->line("text_signin_title"); ?></h5>
                            <form id="loginForm" method="POST" class="form-signin">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control form-control-lg" id="inputEmail" type="email" name="email" placeholder="<?= $this->lang->line("text_enter_email"); ?>"
                                        maxlength="256" autofocus="">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Password</label>
                                    <input class="form-control form-control-lg" id="inputPassword" type="password"
                                        placeholder="<?= $this->lang->line("text_enter_password"); ?>" name="password" maxlength="20">
                                </div>
								<div class="row mb-3">
									<div class="col-6">
										<label class="form-check">
										<input class="form-check-input" type="checkbox" name="remember">
										<span class="form-check-label">
										<?= $this->lang->line("text_remember_password"); ?>
										</span>
										</label>
									</div>
									<div class="col-6 text-end">
										<a class="fpsw" href="<?= base_url(); ?>admin/forgot-password"><?= $this->lang->line("text_i_forgot_password"); ?></a>
									</div>
								</div>
                                <div class="d-grid">
								<button id="loginButton" class="btn btn-lg btn-primary" data-style="zoom-in" data-size="l"
                                    type="submit"><span class="ladda-label"><?= $this->lang->line("text_signin"); ?></span></button>
								</div>	
                            </form>
                        </div>
       
						</div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
<div id="toasts"></div>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
	    <script src="<?= base_url(); ?>assets/vendors/ladda/spin.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/ladda/ladda.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/admin/auth.js"></script>
	<script>
</script>
</script>
</body>

</html>