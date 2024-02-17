

    var myVar = setInterval(myTimer, 400);
    var number = 1;
    var reload_counter = 1;
    var days =  ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var datetime = new Date();
    initial_hour = datetime.getHours();
    var data_output = ' '; 

    if (initial_hour < 10) {initial_hour = '0' + initial_hour};

    function myTimer() {
      var d = new Date();
      var day = days[ d.getDay() ];
      var date = d.getDate(); 
      var month = months[ d.getMonth() ];
      hour = d.getHours();
      minute = d.getMinutes();
      seconds = d.getSeconds();

      if (day < 10) {day = '0' + day}
      if (hour < 10) {hour = '0' + hour}
      if (minute < 10) {minute = '0' + minute}
      if(seconds < 10 ) {seconds = '0' + seconds}

      var timeshow =  hour + ':' + minute + ':' + seconds;
      dateshow = day  + ', '+ date + ' '  + ' ' + month + ' ' ; //+ d.getFullYear();

      document.getElementById('timeshow').innerHTML =  dateshow + ' ' + timeshow + ' ' + data_output ;   

      number++;   
      reload_counter++;

      if (hour != initial_hour){
        //location.reload();
      } else if (reload_counter > 100) {
        //location.reload();
      }  

    }
