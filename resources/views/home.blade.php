<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <ul>
       <li><a href="/">Tieng Anh</a></li>
       <li><a href="/vi">Tieng viet</a></li>
       <li><a href="{{route('blog')}}">Blog</a></li>
   </ul>

   <div class="container">
       <div class="content">
            <p>{{test()}}</p>
           <h2>{{__('message.hello')}}</h2>
           <p>{{__('message.abc')}}</p>
       </div>
   </div>
</body>
</html>