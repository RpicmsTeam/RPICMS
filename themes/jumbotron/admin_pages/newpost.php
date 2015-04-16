<h2>New Post</h2>
  <form action="../../core/backend/admin/blog/newpost.php" method="post">
    <div class="form-group">
      <label for="post_title">Title</label>
      <input type="text" name="title" class="form-control" id="post_title">
    </div>
    <div class="form-group">
      <label for="post_author">Author</label><!-- will later be check with login ;) -->
      <input type="text" name="author" class="form-control" id="post_author">
    </div>
    <div class="form-group">
      <label for="post_category">Category</label><!-- will later be check with login ;) -->
      <input type="text" name="category" class="form-control" id="post_category">
    </div>
    <div class="form-group">
    <label for="post_content">Content</label>
        <div id="toolbar"></div>
        <input name="content" style="width:100%" id="editor"></input>
    </div>
    <button type="submit" class="btn btn-default">Save</button>
  </form>
