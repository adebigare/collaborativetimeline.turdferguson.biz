<div class="subhead large-12 columns">
	<h1>Upload A New Profile Photo</h1>
</div>	

	<?php if(isset($error)): ?>
			<div class="error">
				<p>
			   Upload failed. Double check your file. Files should be less than 3MB and smaller than 400px x 400px.
				</p>
			</div>
	<?php endif; ?>

	<form class="form" id="Upload" action="/users/p_upload_profile_image" enctype="multipart/form-data" method="post"> 
			  
		<input type="hidden" name="MAX_FILE_SIZE" value="30000"> 

		<p> <label for="file">File to upload:</label> </p> 

		<p> <input id="upload_image_file" type="file" name="upload_image_file"> </p>

				 
		<input id="upload_image_submit" class="button small radius" type="submit" name="upload_image_submit" value="Give me a face!"> 
	 
	</form> 
		


	