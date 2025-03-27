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
        <h1>Quản lý Danh mục <?php echo $keyword ?></h1>
    </header>
    <div class="search_content">
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
            <?php
            $kq = '';
            foreach ($listdanhmuc as $key => $value) {
                extract($value); // Tách các giá trị từ $value thành biến
                $kq .= ' <tr>
                                <td>' . $category_id . '</td>
                                <td>' . htmlspecialchars($name_cate) . '</td>
                                <td>' . $total_products . '</td> <!-- Hiển thị số sản phẩm -->
                                <td>';
                if (!empty($img_cate)) {
                    $kq .= '<img src="../public/upload/imgs/Products/' . htmlspecialchars($img_cate) . '" alt="Hình ảnh" style="width: 70px; height: auto;">';
                } else {
                    $kq .= '<p>Không có hình ảnh</p>';
                }
                $kq .= '</td>
                             <td>
                                <button class="btn"><a href="index.php?page=category&action=update&maDanhMuc=' . $category_id . '"><i class="fa-solid fa-pen-nib"></i></a></button>
                                <form action="index.php?page=category&action=deletedanhmuc&category_id=' . $category_id . '" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa danh mục này?\');"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>';
            }

            echo $kq;
            ?>

        </tbody>
    </table>
</div>
</div>
</div>
</body>

</html>