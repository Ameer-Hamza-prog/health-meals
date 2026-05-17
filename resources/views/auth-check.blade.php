<!DOCTYPE html>
<html>
<head>
    <title>Auth Check</title>
</head>
<body>
    <h1>Auth Check</h1>
    <div id="status">Checking...</div>
    
    <script>
        fetch('/check-auth')
            .then(r => r.json())
            .then(data => {
                document.getElementById('status').innerHTML = 
                    '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            })
            .catch(err => {
                document.getElementById('status').innerHTML = 'Error: ' + err;
            });
    </script>
    
    <p><a href="/login">Go to Login</a></p>
    <p><a href="/logout">Logout</a></p>
    <p><a href="/dashboard">Dashboard</a></p>
</body>
</html>
