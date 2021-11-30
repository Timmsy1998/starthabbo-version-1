var fansiteplayerClass = Class.create( {

   playnpause: function() {

     if( $( 'playnpause' ).hasClassName( 'pause' ) ) {

       $( 'playnpause' ).className = 'play';
       player.sendEvent( 'play', 'false' );

     } else {

       $( 'playnpause' ).className = 'pause';
       player.sendEvent( 'play', 'true' );

     }

   },

   volume: function() {

     var volume_slider = $( 'volume_slider' );

     new Control.Slider( volume_slider.down( '.handle' ), volume_slider, {

       range: $R( 0, 200 ),
       sliderValue: 50,
       onSlide: function( value ) {

         player.sendEvent( 'volume', value );

       }

     } );

   }

} );

var eplayer = new fansiteplayerClass();

document.observe( 'dom:loaded', function() {

   var flashvars =
   {
     'file':               'https://radio.habbofests.com/radio/8020/autodj?1611843107',
     'title':              'StartHabbo',
     'type':               'sound',
     'duration':           '999999',
     'autostart':          'true',
     'playerready':        'imready'
   };

   var params =
   {
     'allowfullscreen':    'false',
     'allowscriptaccess':  'always'
   };

   var attributes =
   {
     'id':                 'player',
     'name':               'player'
   };

   swfobject.embedSWF( 'player.swf', 'radioplayer', '1', '1', '9.0.124', false, flashvars, params, attributes );

   eplayer.volume();

} );

var player;

function imready(obj) {

   player = document.getElementById( obj['id'] );

};