<?php

$nav = View::factory('artist/partials/nav');
$nav->slug = $artist->slug;
echo $nav;

?>

<div id='page-content'>
	<h2 id='artist-name'><?php echo $artist_data->name; ?></h2>
	<h3 class='subtitle'><?php echo $artist_data->city; ?></h2>
	<h3 class='subtitle'><?php echo $artist_data->genre; ?></h2>
	<section id='artist-bio'>
		<img id='artist-photo' src='<?php echo $artist_data->photos[0]; ?>' alt='<?php echo $artist_data->name . ' photo'; ?>' />
		<?php echo $artist_data->description; ?>
	</section>
</div>


<?php

$track_player = View::factory('artist/partials/track_player');
$track_player->tracks = $artist_data->tracks;
$track_player->artist_name = $artist_data->name;
echo $track_player;

?>
