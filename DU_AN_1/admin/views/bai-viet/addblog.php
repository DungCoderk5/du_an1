
<link rel="stylesheet" href="./views/assets/css/add_blog.css">
    <div class="main-content">
            <div class="form-container">
                <h2>Thêm mới bài viết</h2>
              <form action="index.php?page=blog&action=addblog" method="POST" enctype="multipart/form-data">          <!-- Post Title -->
                    <div class="form-group">
                        <label for="postTitle">Tiêu đề bài viết</label>
                        <input type="text" id="postTitle" name="postTitle" required>
                    </div>

                    <!-- Post Content -->
                    <div class="form-group">
                        <label for="postContent">Nội dung bài viết</label>
                        <textarea id="postContent" name="postContent" required></textarea>
                    </div>
                     <div class="form-group">
                        <label for="postauthor">Tác Giả</label>
                         <select id="postautho" name="postautho" required>
                               <?php
                    
                    foreach ( $author_name as $item) {
                        extract($item);
                        echo '<option value="'.$user_id.'">'.$username.'</option>';
                    }
                    ?>
                        </select>
                    </div>

                    <!-- Post Image -->
                    <div class="form-group">
                        <label for="postImage">Ảnh bài viết</label>
                        <input type="file" id="postImage" name="postImage" accept="image/*">
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn" name="themblog">Thêm mới</button>
                    <button type="reset" class="btn btn-danger">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>