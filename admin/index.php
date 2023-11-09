<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template" />

  <title>Admin</title>

  <link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="" />

  <!-- PICK ONE OF THE STYLES BELOW -->
  <link href="./css/classic.css" rel="stylesheet" />
</head>

<body>
  <!-- Default setting -->
  <script src="./js/app.js"></script>
  <div class="wrapper">
    <!-- Left menu -->
    <?php include("left-menu.php") ?>

    <div class="main">

      <?php
      // Header
      include("header.php");

      // Main
      if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
          case 'home':
          case 'dashboard':
            include("dashboard.php");
            break;

            // Category
          case 'listCategory':
            include("category/list-category.php");
            break;
          case 'addCategory':
            include("category/add-category.php");
            break;
          case 'updateCategory':
            include("category/update-category.php");
            break;

            // Product
          case 'listProduct':
            include("product/list-product.php");
            break;
          case 'addProduct':
            include("product/add-product.php");
            break;
          case 'updateProduct':
            include("product/update-product.php");
            break;

            // User
          case 'listUser':
            include("user/list-user.php");
            break;
          case 'addUser':
            include("user/add-user.php");
            break;
          case 'updateUser':
            include("user/update-user.php");
            break;

            // Comment
          case 'comment':
            include("comment/list-comment.php");
            break;
          case 'detailComment':
            include("comment/detail-comment.php");
            break;

            // Order
          case 'order':
            include("order/list-order.php");
            break;
          case 'detailOrder':
            include("order/detail-order.php");
            break;

            // Default
          default:
            include("dashboard.php");
            break;
        }
      } else {

        include("dashboard.php");
      }

      // Footer
      include("footer.php");
      ?>
    </div>
  </div>


</body>

</html>