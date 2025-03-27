<style>
/* General Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fa;
}

/* Search Form */
.search {
    display: flex;
    justify-content: center;
    /* Center the form horizontally */
    padding: 10px;
}

.search form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1200px;
    /* Limit the form width */
    background-color: #fff;
    /* White background for the form */
    padding: 10px;
    border-radius: 8px;
    /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Subtle shadow */
}

.search input[type="text"] {
    padding: 15px 20px;
    border: 2px solid #b17457;
    border-radius: 4px;
    font-size: 18px;
    /* Increased font size */
    width: 100%;
    /* Make the input take up 70% of the form width */
    margin-right: 10px;
    transition: all 0.3s ease-in-out;
    /* Smooth transition */
}

.search input[type="text"]:focus {
    border-color: #0056b3;
    /* Dark blue on focus */
    box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
    /* Glowing effect on focus */
    outline: none;
}

.search input[type="submit"] {
    padding: 15px 20px;
    border: 2px solid #007bff;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    font-size: 18px;
    /* Increased font size */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* Subtle shadow */
}

.search input[type="submit"]:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    /* Slight lift effect on hover */
}

.search input[type="submit"]:active {
    transform: translateY(2px);
    /* Slight push effect when clicked */
}

/* Pagination */
#pagination {
    margin-top: 20px;
    text-align: center;
}

#pagination ul {
    display: inline-flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

#pagination ul li {
    margin: 0 5px;
}

#pagination ul li a {
    padding: 10px 15px;
    text-decoration: none;
    border: 1px solid #ccc;
    color: #007bff;
    font-weight: bold;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

#pagination ul li a:hover {
    background-color: #007bff;
    color: white;
}

#pagination ul li a.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

#pagination ul li a:focus {
    outline: none;
}

/* Responsive Layout */
@media (max-width: 768px) {
    .search_content {
        flex-direction: column;
        align-items: flex-start;
    }

    .search input[type="text"],
    .search input[type="submit"] {
        width: 100%;
        margin: 10px 0;
    }
}
</style>

<div class="main-content">
    <header>
        <h1>Quản lý Danh mục</h1>
    </header>
    <div class="search_content">
        <button class="btn">
            <a href="index.php?page=category&action=adddanhmuc">Thêm Danh Mục</a>
        </button>

        <!-- Search -->
        <div class="search">
            <form action="index.php" method="get" id="search">
                <input name="page" type="hidden" value="category" />
                <input name="action" type="hidden" value="search" />
                <input name="keyword" type="text"
                    value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                    placeholder="Tìm danh mục ..." />
                <input type="submit" value="Tìm">
            </form>
        </div>
    </div>
    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh mục</th>
                <th>Số Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listdanhmuc as $key => $value): ?>
            <?php extract($value); // Tách giá trị thành biến ?>
            <tr>
                <td><?php echo $category_id; ?></td>
                <td><?php echo htmlspecialchars($name_cate); ?></td>
                <td><?php echo $total_products; ?></td> <!-- Hiển thị số sản phẩm -->
                <td>
                    <?php if (!empty($img_cate)): ?>
                    <img src="../public/upload/imgs/Products/<?php echo htmlspecialchars($img_cate); ?>" alt="Hình ảnh"
                        style="width: 65px; height: auto;">
                    <?php else: ?>
                    <p>Không có hình ảnh</p>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn">
                        <a href="index.php?page=category&action=update&maDanhMuc=<?php echo $category_id; ?>"><i
                                class="fa-solid fa-pen-nib"></i></a>
                    </button>
                    <form action="index.php?page=category&action=deletedanhmuc&category_id=<?php echo $category_id; ?>"
                        method="POST" style="display:inline;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div id="pagination">
        <ul>
            <li>
                <a href="index.php?page=category&pagedm=1" class="<?php echo ($page == 1) ? 'active' : ''; ?>">First</a>
            </li>
            <li>
                <a href="index.php?page=category&pagedm=<?php echo ($page > 1) ? $page - 1 : 1; ?>"
                    class="<?php echo ($page == 1) ? 'disabled' : ''; ?>">Prev</a>
            </li>
            <?php for ($i = 1; $i <= $sotrang; $i++): ?>
            <li>
                <a href="index.php?page=category&pagedm=<?php echo $i; ?>"
                    class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            </li>
            <?php endfor; ?>
            <li>
                <a href="index.php?page=category&pagedm=<?php echo ($page < $sotrang) ? $page + 1 : $sotrang; ?>"
                    class="<?php echo ($page == $sotrang) ? 'disabled' : ''; ?>">Next</a>
            </li>
            <li>
                <a href="index.php?page=category&pagedm=<?php echo $sotrang; ?>"
                    class="<?php echo ($page == $sotrang) ? 'active' : ''; ?>">Last</a>
            </li>
        </ul>
    </div>
</div>
</body>

</html>