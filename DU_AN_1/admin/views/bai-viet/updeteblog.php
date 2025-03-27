<link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/add_blog.css">
<div class="main-content">
    <div class="form-container">
        <h2>Cập nhật bài viết</h2>
       <form action="index.php?page=blog&action=updeteblog" method="POST" enctype="multipart/form-data">
<input type="hidden" name="postID" value="<?= $blog['blog_id'] ?>">
            <!-- Post Title -->
            <div class="form-group">
                <label for="postTitle">Tiêu đề bài viết</label>
                <input type="text" id="postTitle" name="postTitle" value="<?= $blog['title'] ?? null ?>" required>
            </div>

            <!-- Post Content -->
            <div class="form-group">
                <label for="postContent">Nội dung bài viết</label>

                <textarea id="postContent" name="postContent" required><?= $blog['content'] ?? null ?></textarea>

            </div>
            <div class="form-group">
                <label for="postautho">Tác Giả</label>
                <select id="postautho" name="postautho" required>
                    <?php

                    foreach ($author_name as $item) {
                        extract($item);
                        echo '<option value="' . $user_id . '">' . $username . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Post Image -->
            <div class="form-group">
                <label for="postImage">Ảnh bài viết</label>
                <input type="file" id="postImage" name="postImage" accept="image/*">
                <img src="<?= "../public/upload/" . $blog['img'] ?>" width=100 alt="">
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn" name="capnhatblog">Cập Nhật</button>
            <button type="reset" class="btn btn-danger">Hủy</button>
        </form>
    </div>
</div>
</div>
</body>

</html>