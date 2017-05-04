/************************************************************************************************************/

(function () {

     "use strict";

/************************************************************************************************************/

     jQuery( window ).load( function(){

          // Make all bordered columns the same height.
          jQuery( window ).on( 'resize', bambooThemeCheckColumns );
          bambooThemeCheckColumns();

     } );

/************************************************************************************************************/

     function bambooThemeCheckColumns() {

          // Reset the height of all columns.
          jQuery( '.bamboo-columns.bordered .bamboo-column' ).css( 'height', 'auto' );

          // If the screen is larger than mobile...
          if( jQuery( 'body' ).width() > 640 ) {

               // Adjust each set of columns.
               jQuery( '.bamboo-columns.bordered .bamboo-column' ).each( function(){
                    bambooThemeAdjustColumn( this );
               });

          }

     }

/************************************************************************************************************/

     function bambooThemeAdjustColumn( column ) {

          var div = jQuery( column );

          div.siblings().each(function(){

               var height = jQuery( this ).height();
               if( height > div.height() ) {
                    div.height( height );
               }

          });

     }

/************************************************************************************************************/

}());

/************************************************************************************************************/