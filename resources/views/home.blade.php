<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="fa fa-bell"></i>
          <span class="badge badge-light bg-success badge-xs">{{auth()->user()->unreadNotifications->count()}}</span>
      </a>
      <ul class="dropdown-menu">
                  @if (auth()->user()->unreadNotifications)
                  <li class="d-flex justify-content-end mx-1 my-2">
                      <a href="{{route('mark-as-read')}}" class="btn btn-success btn-sm">Mark All as Read</a>
                  </li>
                  @endif
   
                  @foreach (auth()->user()->unreadNotifications as $notification)
                  <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['data']}}</li></a>
                  @endforeach
                  @foreach (auth()->user()->readNotifications as $notification)
                  <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['data']}}</li></a>
                  @endforeach
      </ul>
   </li>
   
   <?php $name = Auth::user()->name ?>
   <div class="container">
      <h3> Hello {{$name}}</h3>
   </div>
</body>
</html>