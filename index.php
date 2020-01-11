<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="jquery-1.11.0.js"></script>
        
    </head>
    <body>
        <form id="check" >
            username : <input id="username" name="username">
            <input id="submit" type="submit">
        </form>
        
        <div style="display: none;" id="load">
            Loading
        </div>
        <script>
            
            console.log($('#check'));
            $('#submit').on('click',function(event) {
                
        
                event.preventDefault();
                
                var username = $('#username').val();
                
                
                $.ajax({
            
                    url:"./check.php",
                    data : {username : username},
                    type:"post",
                    
                    success:function (res){
                        
                        console.log(res);
                        
                        if (res.notExists){
                            $('#load').html('username is valid');
                           
                        }
                        else {
                            
                           $('#load').html('username not valid');
                        }
                        
                    },
                    beforeSend:function(){
                        console.log('loading');
        $('#load').html('loading from before send');               
        $('#load').fadeIn();
                       
                    },
                    
                   error:function(){
                       $('#load').html('Error Happen');
                      console.log('Error');
                   }
            
            
                });
                
            } );
        
        
        </script>
    </body>
</html>
