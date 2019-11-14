$(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  
  $('.myDatePicker').datepicker({
format: "dd-mm-yyyy",
todayHighlight: true,
autoclose: true
  });

  $('.myDatePicker').datepicker('setDate', today);




  $('.myDatePicker1').datepicker({
format: "dd-mm-yyyy",
todayHighlight: true,
autoclose: true
  });

 var a='<?php echo $var=$_POST["repFromDate"] ;?>'; 

    $('.myDatePicker1').datepicker('setDate', a);


});

/*$(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  
  $('.myDatePicker').datepicker({
format: "dd-mm-yyyy",
todayHighlight: true,
startDate: today,
autoclose: true
  });

  $('.myDatePicker').datepicker('setDate', today);



});*/

