<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Insert title here</title>
    </head>
    <body>
        <table id="myTable" cellpadding="2" cellspacing="2" border="1" onclick="tester()"></table>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>
        // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('75f818b071a2ca8da95a', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     //document.write();
            var str = JSON.stringify(data);
            var parsedJSON = JSON.parse(JSON.stringify(data));
            console.log(parsedJSON);
                
                var table = document.getElementById("myTable");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                
                

                cell1.innerHTML = parsedJSON.text,
                cell2.innerHTML = parsedJSON,text;
                
            
     // alert(JSON.stringify(data));
    });
            
        </script>
    </body>
</html>