$('#bmenu').on('click',function(){
  $('#mostrar_menu').toggleClass('mostrar');
})

$(window).resize(function() {
  var ancho= window.innerWidth;
  if(ancho > 768){
    $('#mostrar_menu').removeClass('mostrar');
  }
  console.log(ancho);
});

function fueraMenu(){
  $('#mostrar_menu').removeClass('mostrar');
}