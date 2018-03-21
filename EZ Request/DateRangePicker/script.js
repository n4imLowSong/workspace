/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */

date1 = 9;
date2 = 9;

function start_end_datepicker(date1, date2){

  if (date1 != 9 && date2 != 9) {


    var start = new Date(date1);
    var end = new Date(date2);
    var totalDays = 0;
    var cfriday = 0;
    var csaturday = 0;
    var cuti_am_list = ["28/1/2017", "29/1/2017", "5/3/2017", "26/4/2017", "10/5/2017", "4/6/2017", "12/6/2017", "25/6/2017", "26/6/2017", "31/8/2017", "1/9/2017", "2/9/2017", "16/9/2017", "21/9/2017", "18/10/2017","1/12/2017","25/12/2017" ];
    var cuti_am = 0;

    while(start <= end){   

       if (start.getDay() == 5) {
          cfriday++;

       }  
       if (start.getDay() == 6) {
          csaturday++;

       } 

       if ( cuti_am_list.indexOf(start.toLocaleDateString()) != -1 ) {

          cuti_am++;
       }   

       var newDate = start.setDate(start.getDate() + 1);
       start = new Date(newDate);

       totalDays++;
    }

    document.getElementById('bh_dipohon').value=totalDays-cfriday-csaturday-cuti_am;
    document.getElementById('jumaat').value=cfriday;
    document.getElementById('sabtu').value=csaturday;
    document.getElementById('bh_am').value=cuti_am;
  }
}

$(document).ready(
  //var dropoffdate;
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#pickup_date" ).datepicker({
      //changeMonth: true,//this option for allowing user to select month
      //changeYear: true, //this option for allowing user to select from year range
      
      minDate: new Date('2015'),
      onSelect : function(selected_date){
        var selectedDate = new Date(selected_date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime());

        $("#dropoff_date").datepicker( "option", "minDate", endDate );

        date1 = selected_date;
        start_end_datepicker(date1, date2);




      }
    });
    
    $('#dropoff_date').datepicker(

    {

       onSelect : function(selected_date){

              date2 = selected_date;              
              start_end_datepicker(date1, date2);
              
              //alert (totalDays+1);

      }
    });
  }
  
  
);

