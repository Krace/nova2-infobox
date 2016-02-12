<?php

if ($this->auth->is_logged_in())
{
	// Instead of manually querying, use the models to get the user
	$user = $this->user->get_user($this->session->userdata('userid'));

	if ($user)
	{
		// Get the main character for the user
		$character = $this->char->get_character($user->main_char);
		
		// Use the user object that's returned to fill the data
		$name = $user->name;
		$date_of_birth = $user->date_of_birth;
		$location = $user->location;

		// Get the character name with the rank, without the short rank, and with a link to the bio
		$character_name = $this->char->get_character_name($character->charid, true, false, true);
		
		// You can grab the character images and explode at the same time
		$imgarr = explode(",", $character->images);
		$char_image = $imgarr[0];
		
		// Get the position names
		$posa_name = $this->positions_model->get_position($character->position_1, 'pos_name');
		$posb_name = $this->positions_model->get_position($character->position_2, 'pos_name');
	}
	
	#TODO: you'll want to do something here in the (unlikely) scenario where there is no user object
}
else
{
	$name = 'Guest';
	$date_of_birth = false;
	$location = false;
	$char_image = 'GuestAv.png';
	$character_name = false;
	$posa_name = false;
	$posb_name = false;
}

echo $name;

if ($date_of_birth)
{
	echo '<br />' . $date_of_birth;
}

if ($location)
{
	echo '<br />' . $location;
}

if ($char_image)
{
	echo 
		'<div class="infobox-image-container">
			<img src="' . base_url() . 'application/assets/images/characters/' . $char_image . '" class="infobox-image">
		</div>';
}
else
{
	echo
		'<div class="infobox-image-container">
			<img src="' . base_url() . 'application/views/'.$current_skin.'/_global/images/no-avatar.png" class="infobox-image">
		</div>';
}

echo $character_name;

if ($posa_name)
{
	echo '<br />' . $posa_name;
}

if ($posb_name)
{
	echo '<br />' . $posb_name;
}
