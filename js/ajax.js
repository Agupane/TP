/* se ejecuta al final de la pagina */
/*$("p") por tag
$("·ID")
$(".clase")

$("p span ") != $("p.miclase")*/
$(document).ready(function () {

});

function myAjax() {
      $.ajax({
           type: "POST",
           url: 'ajax.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }

      });
 }