var Packages = {
	common : {
		init: function() {
			$('#logo-repeat').css({
				width: $('header').offset().left,
				top: $('header').offset().top
			});
			$(window).resize(arguments.callee);
		},
		finalize: function() {
			$('a[href^="' + site.baseURL + '"]').click(UTIL.newPageEvents);
		},

		newPage: function() {
			return false;
		}
	},

	artist: {
		init: function() {
			var $audio = $('#audio');
			
			$audio.jPlayer({
				swfPath: site.baseURL + 'inc/swf/'
			});


			$('#track-player').find('li a').click(function() {
				$('#track-player').find('li').removeClass('active');
				$(this).parent().addClass('active')
				
				Packages.artist.playTrack($audio, $(this).attr('href'), $(this).text());
				
				return false;	
			});

			$('#play-pause').click(function() {
				var $this = $(this);
				if ( $this.hasClass('play') ) {
					Packages.artist.playTrack($audio);	
				}
				else 
				{
					Packages.artist.pauseTrack($audio);
				}

				return false;
			});
			
			$('#track-player li:first a').click();
			$('#play-pause').click();
		},

		playTrack: function($audio, streamURL, trackName, album, year) {
			if ( streamURL !== undefined ) {
				
				$audio.jPlayer('setMedia', {
					mp3: streamURL
				});

				$('#track-name').text(trackName);

				album = album == undefined ? 'Unknown Album' : album;
				year = year == undefined ? 'Unknown Year' : year;

				$('#track-album').text(album);
				$('#track-year').text(year);
			}
			$audio.jPlayer('play');

			$('#play-pause').removeClass('play').addClass('pause');
		},

		pauseTrack: function($audio) {
			$audio.jPlayer('pause');

			$('#play-pause').removeClass('pause').addClass('play');
		}
	}
};

var UTIL = {
	isFunc: function(pack, funcname) {
		var namespace = Packages;  // indicate your obj literal namespace here
	 
		funcname = (funcname === undefined) ? 'init' : funcname;
		return pack !== '' && namespace[pack] && typeof namespace[pack][funcname] == 'function';

	},

	fire: function(pack, funcname, args) {
		var namespace = Packages;  // indicate your obj literal namespace here
	 
		funcname = (funcname === undefined) ? 'init' : funcname;
		if ( UTIL.isFunc(pack, funcname) ) {
		  return namespace[pack][funcname](args);
		} 
		else return false;
	},

	loadEvents: function() {
		UTIL.fire('common');
		$.each(document.body.className.split(/\s+/), function(i, classNm) {
			UTIL.fire(classNm);
		});
		UTIL.fire('common', 'finalize');
	},

	newPageEvents: function() {
		var href = $(this).attr('href'),
			classes = document.body.className.split(/\s+/);

		for ( i = classes.length - 1; i >= 0; i++ ) {
			if ( UTIL.isFunc(classes[i], 'newPage') ) return UTIL.fire(classes[i], 'newPage', {'href': href});
		}
		
		return UTIL.fire('common', 'newPage', { 'href': href });

	}
};

$(document).ready(function() {  UTIL.loadEvents(); });


