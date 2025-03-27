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

<!-- Main Content -->
<div class="main-content">
    <header>
        <h1>Quản lý Người dùng</h1>
    </header>
    <div class="content">
        <div class="search_content">
            <!-- <button class="btn"><a href="index.php?page=customer&action=adduser">Thêm Người dùng</a></button> -->
            <div class="search">

                <form action="index.php" method="get" id="search">
                    <input name="page" type="hidden" value="customer" /> <!-- Keep the page parameter -->
                    <input name="action" type="hidden" value="search" /> <!-- Keep action as search -->
                    <input name="keyword" type="text"
                        value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                        placeholder="Tìm người dùng ..." />
                    <input type="submit" value="Tìm"> <!-- Submit button without name="submit" -->
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Người dùng</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Password</th>
                    <th>Avatar</th>
                    <th>Trạng thái</th>
                    <th>Vai trò</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $key => $value) {
                    extract($value);
                    $vaitro = ($role == 1) ? 'ADMIN' : 'USER';
                    $trangthai = ($account_status == 1) ? 'Đang hoạt động' : 'Không hoạt động';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($user_id) ?></td>
                        <td><?= htmlspecialchars($username) ?></td>
                        <td><?= htmlspecialchars($phone) ?></td>
                        <td><?= htmlspecialchars($email) ?></td>
                        <td><?= htmlspecialchars($address) ?></td>
                        <td class="drug"><?= htmlspecialchars($password) ?></td>
                        <td>
                            <?php if (!empty($avatar)): ?>
                                <img src="../public/upload/<?= htmlspecialchars($avatar) ?>" alt="Hình ảnh"
                                    style="width: 50px; height: auto;">
                            <?php else: ?>
                                <p>Không có hình ảnh</p>
                            <?php endif; ?>
                        </td>
                        <td><?= $trangthai ?></td>
                        <td><?= $vaitro ?></td>
                        <td>
                            <div class="flex-actions">
                                <button class="btn">
                                    <a href="index.php?page=customer&action=update&maKhachHang=<?= $user_id ?>">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                </button>
                                <?php if ($account_status == 1): ?>
                                    <form action="index.php?page=customer&action=hidenguoidung&user_id=<?= $user_id ?>"
                                        method="post">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn ẩn người dùng này?');">Ẩn</button>
                                    </form>
                                <?php else: ?>
                                    <form action="index.php?page=customer&action=shownguoidung&user_id=<?= $user_id ?>"
                                        method="post">
                                        <button type="submit" class="btn"style="background-color:gray;color:black;"
                                            onclick="return confirm('Bạn có chắc chắn muốn hiện người dùng này?');">Hiện</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div id="pagination">
            <ul>
                <!-- First Page Button -->
                <li>
                    <a href="index.php?page=customer&pageus=1"
                        class="<?php echo ($page == 1) ? 'active' : ''; ?>">First</a>
                </li>

                <!-- Previous Page Button -->
                <li>
                    <a href="index.php?page=customer&pagepus=<?php echo ($page > 1) ? $page - 1 : 1; ?>"
                        class="<?php echo ($page == 1) ? 'disabled' : ''; ?>">Prev</a>
                </li>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $sotrang; $i++): ?>
                    <li>
                        <a href="index.php?page=customer&pageus=<?php echo $i; ?>"
                            class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <!-- Next Page Button -->
                <li>
                    <a href="index.php?page=customer&pageus=<?php echo ($page < $sotrang) ? $page + 1 : $sotrang; ?>"
                        class="<?php echo ($page == $sotrang) ? 'disabled' : ''; ?>">Next</a>
                </li>

                <!-- Last Page Button -->
                <li>
                    <a href="index.php?page=customer&pageusr=<?php echo $sotrang; ?>"
                        class="<?php echo ($page == $sotrang) ? 'active' : ''; ?>">Last</a>
                </li>
            </ul>
        </div>


    </div>
    </body>

    </html>
    <style>
        .flex-actions {
            display: flex;
            gap: 10px;
            /* Khoảng cách giữa các nút */
            align-items: center;
            /* Căn giữa theo chiều dọc */
        }

        .flex-actions button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>