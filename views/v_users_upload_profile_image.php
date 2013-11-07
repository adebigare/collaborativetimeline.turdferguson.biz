	<?php if(isset($error)): ?>
			<div class="error">
				<p>
			   Upload failed. Double check your file. Files should be less than 3MB and smaller than 400px x 400px.
				</p>
			</div>
	<?php endif; ?>

	<form class="form" id="Upload_profile_photo" action="/users/p_upload_profile_image" enctype="multipart/form-data" method="post"> 
			  
		<p> <label for="file">File to upload:</label> </p> 

		<p> <input id="upload_image_file" type="file" name="upload_image_file"> </p>

				 
		<input id="upload_image_submit" class="button small radius" type="submit" name="upload_image_submit" value="Give me a face!"> 
	 
	</form> 
		


	