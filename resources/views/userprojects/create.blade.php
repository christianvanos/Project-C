@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])
@section('content')

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
  <!--<form method="post" action="/userprojects">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" user_id="user_id" class="form-control" placeholder="Enter user id" />
    <input type="text" projects_id="projects_id" class="form-control" placeholder="Enter project id" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>-->
 </div>
</div>
@endsection