$(document).ready(function(){
    
    $('.insert-schedule').hide();
    $('.appoinment_schedule').show();
    $('.edit-schedule').hide();
    $('.list-schedule').show();
    $('#deletecareer').modal('hide');
        $('#new_schedule').click(function()
          {
              $('.insert-schedule').show();
              $('.list-schedule').hide();
              $('appoinment_schedule').hide();
              $('.edit-schedule').hide();
          });
          
        $('#update-schedule').click(function(){
              
              $('.insert-schedule').hide();
              $('.list-schedule').show();
              $('.appoinment_schedule').hide();
              $('.edit-schedule').hide();
        });
        
        $('#appointment').submit(function(){
            event.preventDefault();
            // alert(new FormData(this));
           $.ajax({
             url: '../ajax_page/adminappointment.php?type=appointment',
             type: 'POST',
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
               {
                   $('.result').html(data);
               }
           });
        });
        
       
        /* $('#next-schedule').click(function(){
            var start_time=$('#c_start_time').val();
            var end_time=$('#c_end_time').val();
            alert(start_time);
            alert(end_time);
            //start time//
           // var s_time=start_time.toString();
          
            var arr=s_time.split(':');
            var i=12;
            if(arr[0] > i)
            {
                if(arr[0]=='00')
                {
                    var times='12:'+arr[1]+':PM';
                }
                else
                {
                   var stime=arr[0]-12;
                   var times=stime+':'+arr[1]+':PM';  
                }
            }
            else
            {
                if(arr[0]=='00')
                {
                    var times='12:'+arr[1]+':PM';
                }
                else
                {
                    if(arr[0]=='12')
                    {
                        var times=arr[0]+':'+arr[1]+':PM';
                    }
                    else
                    {
                        var times=arr[0]+':'+arr[1]+':AM';
                    }
                   
                }
               
            }
            //end time
            var end_time=$('#c_end_time').val();
            var e_time=end_time.toString();
            var arr_e=e_time.split(':');
            var i=12;
            if(arr_e[0] > i)
            {
                if(arr_e[0]=='00')
                {
                    var times_e='12:'+arr_e[1]+':PM';
                }
                else
                {
                   var stime=arr_e[0]-12;
                   var times_e=stime+':'+arr_e[1]+':PM';  
                }
            }
            else
            {
                if(arr_e[0]=='00')
                {
                    var times_e='12:'+arr_e[1]+':PM';
                }
                else
                {
                    if(arr_e[0]=='12')
                    {
                        var times_e=arr_e[0]+':'+arr_e[1]+':PM';
                    }
                    else
                    {
                        var times_e=arr_e[0]+':'+arr_e[1]+':AM';
                    }
                   
                }
               
            }
            
            alert(times);
            alert(times_e);
            var single_time=$('#single_time').val();
            alert(single_time);
            $('.appoinment_schedule').show();
        })*/
});