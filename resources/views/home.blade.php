<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    </style>
    <title>Document</title>
</head>
<body>
    <h1>These are our respected companies</h1>
    <ul class="compList">
        @foreach($companies as $company)
    
        <li class="companies"><a href="/company/{{$company->id}}">{{$company->name}}</a></li>
        
        @endforeach
    </ul>
    <!--ul>li{Company}.companies$@*5-->
</body>
</html>