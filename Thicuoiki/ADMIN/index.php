<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <title>Thi trắc nghiệm</title>
</head>

<body>
<a href="HomeAD.php">Quay lại trang chủ</a>
  <div class="container">
    <div class="row">
      <!-- Phần tìm kiếm!-->
      <div class="col-sm-4">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" id="txtSearch" />
          <div class="input-group-btn">
            <button class="btn btn-primary" type="submit" id="btnTK">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Kết thúc tìm kiếm!-->
      <!-- Phần phân trang!-->
      <div class="col-sm-6">
        <nav aria-label="Page navigation example">
          <ul class="pagination" style="margin :0px; padding-top:0px" id="phantrang">
  
          </ul>
        </nav>
      </div>
      <!-- Kết thúc phần phân trang-->
      <div class="col-sm-2 text-right">
        <input type="submit" value="Thêm Câu hỏi " id="them" class="btn btn-success"></input>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Câu hỏi</th>
          <th scope="col">Xử Lý</th>
        </tr>
      </thead>
      <tbody id="questions">
      </tbody>
    </table>
  </div>

</body>

</html>

<?php
if (isset($_SESSION['username'])) {
    
  include('quanlycauhoi.php');

} else {
    echo "<script>
            alert('Vui lòng đăng nhập để vào trang quản lý '); 
            window.location='login.php';
            </script>";
    
    exit;
}
?>