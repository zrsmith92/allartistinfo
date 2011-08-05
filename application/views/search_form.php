<h2>Enter an Artist Name.</h3>
<h3 class='subtitle'>Enter any artist, band, or musician, and we will find as much information for you as possible.</h3>
<form method="POST" action="<?= url::site('search') ?>">
    <div id='search-box' class='clearfix'>
    	<input type="text" name="artist" id="artist-input" />
    	<button type="submit" name="submit" id="submit-button">Go</button>
    </div>
</form>