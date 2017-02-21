<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>	
	</head>
	<body>
		<div class = "container"><!--Read the Blog Modal when not Logged In-->
			<div class="modal fade" id="notLoggedInReadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="overflow-y: initial !important">
					 <div class="modal-content" style="">
						  <div class="modal-header">
							   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							   <h4 class="modal-title stopWordBreaking" id="myModalLabel" style="text-align: center"><b></b></h4>
						  </div>
						  <div class="modal-body" style="overflow-y: auto; height: 430px;">
						   		<p class="col-lg-12 col-sm-12 col-md-12 text-center description stopWordBreaking"></p>
						   		<p class="col-lg-12 col-sm-12 col-md-12 stopWordBreaking">
						   			<form method="POST" action="">
										<textarea class="form-control" rows="4" name="comment"></textarea><br />
										<div class="col-lg-8 col-md-8 col-sm-8"></div>
										<div class="col-lg-12 col-md-12 col-sm-12 onlyBorder" style="padding-bottom: 1%;">
											<div class="col-md-4 col-sm-4 col-lg-4 col-lg-offset-8">
														<a href="signUp.php" type="button" class="form-control btn btn-xs btn-primary" style="cursor: pointer;">Register</a>
											</div>
											
										</div>
									</form>
						   		</p>
						   		<div class="col-lg-12 col-sm-12 col-md-12 stopWordBreaking leftRightPaddingSetZero " id="showCommentsInNoneLoggedIn" style="padding-bottom: 1%;">
						   		</div>
						  </div>
						  <div class="modal-footer">
							  	<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						  </div>
					 </div>
				</div>
			</div>
		</div>
		<div class = "container"><!--Register Modal-->
			<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="overflow-y: initial !important">
					 <div class="modal-content" style="">
						  <div class="modal-header">
							   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							   <h4 class="modal-title stopWordBreaking" id="myModalLabel" style="text-align: center"><b>Registration</b></h4>
						  </div>
						  <div class="modal-body" style="overflow-y: auto; height: 430px;">
								<?php
									//include_once('modalRegister.php');
								?>
						  </div>
						  <div class="modal-footer">
							  	<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						  </div>
					 </div>
				</div>
			</div>
		</div>
	</body>
</html>