<h2>Posts</h2>
<table class="table table-striped table-hover">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Short Description</th>
    <th><span class="glyphicon glyphicon-cog" aria-hidden="true" style="text-align:center;"></span></th>
  </tr>
    <?php
      $id = 1;
      $x = 1;
      include($root . '/core/backend/blog/posts.php');
      while ($x < $post_id_clean+1){
        include($root . '/core/config/connect.db.inc.php');
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$post_title</td>";
        echo "<td></td>";
        echo "<td><button style=\"background-color: transparent;text-decoration: underline;border: none;color: blue;cursor: pointer;\" formaction=\"posts.php?function=edit\" title=\"Edit\">Edit</button>  <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>  |  <button style=\"background-color: transparent;text-decoration: underline;border: none;color: blue;cursor: pointer;\" formaction=\"posts.php?function=delete\" title=\"Delete\">Delete</button>  <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></td>";
        echo "</tr>";
        $x = $x+1;
        $id = $id+1;
        next_id_only();
      }
      ?>
</table>
<?php
if(!empty($_GET['function'])){
  if(!empty($_GET['id'])){
      $get_function = $_GET['function'];
      $get_id = $_GET['id'];
      if($get_function="edit"){

      }else{
        deletePost($get_id);
      }




  }
}





?>
