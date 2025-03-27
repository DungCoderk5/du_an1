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
        <h1>Kết quả tìm kiếm <?php echo $keyword ?></h1>
    </header>
    <div class="content">
        <div class="search_content">
            <div class="search">
                <form action="index.php" method="get" id="search">
                    <input name="page" type="hidden" value="product" /> <!-- Keep the page parameter -->
                    <input name="action" type="hidden" value="search" /> <!-- Keep action as search -->
                    <input name="keyword" type="text"
                        value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                        placeholder="Tìm sản phẩm ..." />
                    <input type="submit" value="Tìm"> <!-- Submit button without name="submit" -->
                </form>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Danh Mục</th>
                <th>Hình ảnh</th>
                <th>Mô Tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($listsanpham && count($listsanpham) > 0) {
                foreach ($listsanpham as $value) {
                    extract($value);
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($product_id) . '</td>';
                    echo '<td>' . htmlspecialchars($name_pro) . '</td>';
                    echo '<td>' . number_format($price, 0, ',', '.') . '₫</td>';
                    echo '<td>' . htmlspecialchars($quantity) . '</td>';
                    echo '<td>' . htmlspecialchars($name_cate) . '</td>';
                    echo '<td>';
                    if (!empty($img)) {
                        echo '<img src="../public/upload/imgs/Products/' . htmlspecialchars($img) . '" alt="Hình ảnh" style="width: 70px; height: auto;">';
                    } else {
                        echo '<p>Không có hình ảnh</p>';
                    }
                    echo '</td>';
                    echo '<td>' . htmlspecialchars($description_pro) . '</td>';
                    echo '<td>';
                    echo '<button class="btn"><a href="index.php?page=product&action=update&maSanPham=' . $product_id . '"><i class="fa-solid fa-pen-nib"></i></a></button>';
                    echo '<form action="index.php?page=product&action=deletesanpham&product_id=' . $product_id . '" method="POST" style="display:inline;">';
                    echo '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này?\');"><i class="fa-solid fa-trash"></i></button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='9'>Không tìm thấy sản phẩm nào</td></tr>";
            }
            ?>
        </tbody>

    </table>


</div>