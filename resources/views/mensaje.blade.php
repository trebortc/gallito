<html>
   <head>
      <title>Ajax Example</title>
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#myajax').click(function(){
            //Nosostros enviaremos y recibiremos la informacion de nuestro AJAXCONTROLLER
            alert("im just clicked click me");
            $.ajax({
                url:'/getmsg',
                data:{'name':"luis"},
                type:'post',
                success:  function (response) {
                    alert(response);
                },
                statusCode: {
                    404: function() {
                    alert('web not found');
                    }
                },
                error:function(x,xs,xt){
                    window.open(JSON.stringify(x));
                    //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
            });    
        });
        function getMessage(){
            $.ajax({
               type:'POST',
               url:'/getmsg',
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
        }
        $(document).ready(function(){
    });
      </script>
   </head>
   
   <body>
        <div id = 'msg'>Este mensaje sera reemplazado usando AJAX,
            <br>
            Presione Click para reemplazar el mensaje
        </div>
        <button id='myajax' onclick="getMessage();" >Click</button>
   </body>

</html>