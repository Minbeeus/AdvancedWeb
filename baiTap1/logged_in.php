<form>
    <style>
    form {
        width: 350px;
    }
    </style>

  <div class="row mb-3"> 
    <label class="col-sm-5 col-form-label">Tên đăng nhập là:</label>
    <label class="col-sm-5 col-form-label">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                echo $username;
            }
        ?>
    </label>
  </div>
  <div class="row mb-3">
    <label class="col-sm-5 col-form-label">Mật khẩu là:</label>
    <label class="col-sm-5 col-form-label">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = $_POST["password"];
                echo $password;
            }
        ?>
    </label>
  </div>
</form>