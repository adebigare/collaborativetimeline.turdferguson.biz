<div class="large-8 large-centered columns">

	<h3>Upload a profile picture</h3> 

	<?php if(isset($error)): ?>
			<div class="error"><p>
			   Upload failed. Double check your file. Files should be >30MB.
			</p></div>
	<?php endif; ?>

	<form id="Upload" action="/users/p_upload_profile_image" enctype="multipart/form-data" method="post"> 
			  
		<input type="hidden" name="MAX_FILE_SIZE" value="30000"> 

		<p> <label for="file">File to upload:</label> </p> 

		<p> <input id="upload_image_file" type="file" name="upload_image_file"> </p>

				 
		<input id="upload_image_submit" class="button small radius" type="submit" name="upload_image_submit" value="Give me a face!"> 
	 
	</form> 
		
</div>

	