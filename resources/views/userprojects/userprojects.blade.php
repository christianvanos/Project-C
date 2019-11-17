@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])

@section('content')

<html>

   <head>
      <title>View Users and projects </title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <!--Styling van de pagina 
      <style>
            html, body {
                background-color: #fff;
                color: Grey;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 5;
            }
      </style>-->

   </head>

   <body>
      <h1>User projects</h1>
      <form action = "create" method = "post">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <table>
         <tr>
            <td>User Id</td>
            <td><input type='text' name='user_id' /></td>
               <tr>
               <td>Projects Id</td>
               <td><input type="text" name='projects_id'/></td>
               </tr>
            </tr>
            <tr>
            <td colspan = '2'>
            <input type = 'submit' value = "Add member to project"/>
            </td>
         </tr>
      </table>
      </form>
   </body>
   <body>
   <div class="container">
      @yield('content')
   </div>
   </body>
</html>


@endsection 