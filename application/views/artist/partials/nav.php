<nav id='artist-nav'>
	<ul>
		<li><a href='<?php echo url::site('artist/' . $slug); ?>'>Main <div class='icon home right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/updates'); ?>'>Updates <div class='icon updates right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/tracks'); ?>'>Tracks <div class='icon tracks right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/albums'); ?>'>Albums <div class='icon albums right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/photos'); ?>'>Photos <div class='icon photos right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/videos'); ?>'>Videos <div class='icon videos right'></div></a></li>
		<li><a href='<?php echo url::site('artist/' . $slug . '/shows'); ?>'>Shows <div class='icon shows right'></div></a></li>
	</ul>
</nav>
