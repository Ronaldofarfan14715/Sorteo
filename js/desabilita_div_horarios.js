$(document).on('change','#habilitar',function(){

if ($(this).prop('checked')==false){

$('.form-check-input').prop('disabled',true);}
});