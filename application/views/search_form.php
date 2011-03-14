<h2>Search for an artist.</h3>
<h3>Enter any artist, band, or musician, and we will find as much information for you as possible.</h3>
<form method="POST" action="<?= url::site('search') ?>">
    <input type="text" name="artist" id="artist_input" />
    <button type="submit" name="submit" id="submit_button">Go</button>
</form>