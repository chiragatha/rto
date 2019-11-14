function setDate(elementId,date)
  {  
    $(elementId).datepicker({
    format: "dd-mm-yyyy",
    todayHighlight: true,
    autoclose: true
      });

    $(elementId).datepicker('setDate', date);
  }