var hospitals;

//ajax shit here
$.post( "./hospitals.php", {}).done(function( data ) {
  console.dir(data);
});

