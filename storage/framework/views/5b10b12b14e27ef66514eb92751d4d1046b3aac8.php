<?php
use Illuminate\Support\Facades\Auth;
?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" id="open_n_hide" class="navbar-toggle"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span> দৈনিক</span> স্বাস্থ্য</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
							<p style="padding-left: 4%;padding-top: 3%;"><a href="<?php echo e($_SERVER['PHP_SELF']); ?>" target="_black">Go to your site</a></p>
							</li>
							<li>
							<p style="padding-left: 4%;padding-top: 3%;"> <a href="javascript:void(0)" data-toggle="modal" data-target="#myProfile" onclick="country('<?php echo e(Auth::user()->country_id); ?>')"> Your profile</a></p>
							</li>
							<li class="divider"></li>
							<li>
							<p style="padding-left: 4%;padding-top: 3%;">Change your Password</p>	
							</li>
							<li class="divider"></li>
							
						</ul>
					</li>
					
				</ul>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>

<!-- Modal -->

<div class="modal fade" id="myProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <form method="POST" action="./users/<?php echo e(Auth::id()); ?>">
		  <?php echo csrf_field(); ?>
		  <?php echo method_field('PUT'); ?>
		<div class="modal-body">
			<label for="name">Name: </label>
			<input type="text" name="name" id="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control">
			<label for="email">Enail: </label>
			<input type="email" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control">
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" class="form-control">
			<label for="password2">Confirm Password: </label>
			<input type="password2"  id="password2" class="form-control" onchange="submit_form()">
			<label for="mobile">Mobile: </label>
			<input type="tel" name="mobile" id="mobile" value="<?php echo e(Auth::user()->mobile); ?>" class="form-control">
			<label for="country">Country: </label>
			<select name="country_<?php echo e(Auth::id()); ?>" id="country_<?php echo e(Auth::id()); ?>" class="form-control"></select>
		  </div>
	  </form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="sub_but" disabled>Save changes</button>
      </div>
    </div>
  </div>
</div>

	<script>
function country(country_id){
	var user_id = <?php echo e(Auth::id()); ?>;
	$.ajax({
		url:"https://restcountries.eu/rest/v2/all",
		method:'get',
		dataType:'json',
		success:function(data2){
		var new_text = "";
		$("#country_"+user_id).append("<option value=''></option> ");
		$.each(data2, function(index, value){
		  if(country_id==data2[index].numericCode){
			$("#country_"+user_id).append("<option value='"+data2[index].numericCode+"' selected>"+data2[index].name+"</option> ");
		  }else{
			$("#country_"+user_id).append("<option value='"+data2[index].numericCode+"'>"+data2[index].name+"</option> "); 
		  }
		});
		}
		
		})
}
function submit_form(){
	if($("#password").val()==$("#password2").val()){
	
		alert("Password Matched");
		document.getElementById("sub_but").disabled = false;
	}else{
		alert("Password Didn't Match");
		document.getElementById("sub_but").disabled = true;
	}
}
	</script>
