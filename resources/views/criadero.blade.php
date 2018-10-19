<!DOCTYPE html>
<html>
<head>
    <title>Criadero AJAX</title>
    <style></style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <button id="criaderoBoton">click criaderos</button>
    <div id="resultados"></div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type = "text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#criaderoBoton").click(function() {
                $.ajax({
                    type: "POST",
                    dataType:'html',
                    url : "/listadoCriaderos",
                    success : function (data) {
                        $("#resultados").html(data);
                    }
                });
            });

        });
    </script>
</body>
</html>
