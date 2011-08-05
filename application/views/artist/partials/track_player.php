<aside id='track-player'>
	<h3 class='module-title'><div class='icon left tracks'></div>Tracks</h3>
	<div class='clearfix'>
		<a id='play-pause' href='#' class='ir play'>Play / Pause</a>	
		<p id='track-name'></p>
		<p id='track-album'></p>
		<p id='track-year'></p>
	</div>
	<ul>
		<?php for ( $i = 0; $i < count($tracks) && $i < 10; $i++ ) :
				$track_name = Str::remove_pattern($tracks[$i]['name'], $artist_name);
		?>
		<li>
			<a href='<?php echo $tracks[$i]['stream_url']; ?>' title='<?php echo $track_name; ?>'>
				<?php echo $track_name; ?>
			</a>
		</li>
		<?php endfor; ?>
	</ul>
	<?php if ( count($tracks) == 0 ) : ?>
	<div class='sorry'>Sorry, no tracks found.</div>
	<?php endif; ?>
	<hr class='gray-bar' />
</aside>
