<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
    }

    /* Search Form */
    .search {
        display: flex;
        justify-content: center;  /* Center the form horizontally */
        padding: 10px;
    }

    .search form {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;  /* Limit the form width */
        background-color: #fff;  /* White background for the form */
        padding: 10px;
        border-radius: 8px;  /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Subtle shadow */
    }

    .search input[type="text"] {
        padding: 15px 20px;
        border: 2px solid #b17457;
        border-radius: 4px;
        font-size: 18px;  /* Increased font size */
        width: 100%;  /* Make the input take up 70% of the form width */
        margin-right: 10px;
        transition: all 0.3s ease-in-out;  /* Smooth transition */
    }

    .search input[type="text"]:focus {
        border-color: #0056b3;  /* Dark blue on focus */
        box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);  /* Glowing effect on focus */
        outline: none;
    }
  
    .search input[type="submit"] {
        padding: 15px 20px;
        border: 2px solid #007bff;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        font-size: 18px;  /* Increased font size */
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  /* Subtle shadow */
    }

    .search input[type="submit"]:hover {
        background-color: #0056b3;
        transform: translateY(-2px);  /* Slight lift effect on hover */
    }

    .search input[type="submit"]:active {
        transform: translateY(2px);  /* Slight push effect when clicked */
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

        .search input[type="text"], .search input[type="submit"] {
            width: 100%;
            margin: 10px 0;
        }
    }
</style>

<div class="main-content">
    <header>
        <h1>Quản lý Voucher</h1>
    </header>

 
         <div class="search_content">
    <button class="btn"><a href="index.php?page=voucher&action=addvoucher" >Thêm Voucher</a></button>
      <div class="search">
                <form action="index.php" method="get" id="search">
                    <input name="page" type="hidden" value="voucher" /> <!-- Keep the page parameter -->
                    <input name="action" type="hidden" value="search" /> <!-- Keep action as search -->
                    <input name="keyword" type="text"
                        value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                        placeholder="Tìm sản phẩm ..." />
                   <input type="submit" value="Tìm"> <!-- Submit button without name="submit" -->
                </form>

            </div>
            </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Voucher</th>
               <th>Giảm Giá (%)</th>
      
                <th>Hạn Sử Dụng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu mẫu -->
            <?php
            $kq = '';
            foreach ($voucher as $key => $value) {
                extract($value);
               
                $kq .= '
                <tr>
                    <td>'.$voucher_id.'</td>
                    <td>'.$code.'</td>
                    <td>'.$discount.'%</td>
                    <td>'.$expiration_date.'</td>
                    <td>
                       <button class="btn"><a href="index.php?page=voucher&action=editvoucher&voucher_id=' . $voucher_id . '"><i class="fa-solid fa-pen-nib"></i></a>
        <button class="btn btn-danger"><a href="index.php?page=voucher&action=deletevoucher&voucher_id=' . $voucher_id . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa voucher này?\')"><i class="fa-solid fa-trash"></i></a></button>
                    </td>
                </tr>
                ';
            }
            echo $kq;
            ?>
          
        </tbody>
    </table>
      <div id="pagination">
    <ul>
        <!-- First Page Button -->
        <li>
            <a href="index.php?page=voucher&pagedh=1" class="<?php echo ($page == 1) ? 'active' : ''; ?>">First</a>
        </li>

        <!-- Previous Page Button -->
        <li>
            <a href="index.php?page=voucher&pagedh=<?php echo ($page > 1) ? $page - 1 : 1; ?>" class="<?php echo ($page == 1) ? 'disabled' : ''; ?>">Prev</a>
        </li>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $sotrang; $i++): ?>
            <li>
                <a href="index.php?page=voucher&pagedh=<?php echo $i; ?>"
                   class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                   <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>

        <!-- Next Page Button -->
        <li>
            <a href="index.php?page=voucher&pagedh=<?php echo ($page < $sotrang) ? $page + 1 : $sotrang; ?>" class="<?php echo ($page == $sotrang) ? 'disabled' : ''; ?>">Next</a>
        </li>

        <!-- Last Page Button -->
        <li>
            <a href="index.php?page=voucher&pagedh=<?php echo $sotrang; ?>" class="<?php echo ($page == $sotrang) ? 'active' : ''; ?>">Last</a>
        </li>
    </ul>
</div>

</div>

