// /**
//  * NATIVE JS
//  */

// // Instanciate request
// var xhr = new XMLHttpRequest();

// // Ready stage change callback
// xhr.onreadystatechange = function()
// {
//     // Is done
//     if( xhr.readyState === XMLHttpRequest.DONE )
//     {
//         // Success
//         if(xhr.status === 200)
//         {
//             var result = JSON.parse( xhr.responseText );
//             console.log( 'success' );
//             console.log( result );
//         }
//         else
//         {
//             console.log( 'error' );
//         }
//     }
// };

// // Open request
// xhr.open( 'GET', 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a', true );

// // Send request
// xhr.send();

// /**
//  * JQUERY
//  */
// $.getJSON(
//     'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a',
//     function( data )
//     {
//         console.log(data);
//     }
// );