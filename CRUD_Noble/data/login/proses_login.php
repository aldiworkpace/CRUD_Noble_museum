<?php
session_start();
include '../../koneksi.php';

$error = [];

if (isset($_POST['submit'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username)) {
        $error['username'] = "Username tidak boleh kosong.";
    }

    if (empty($password)) {
        $error['password'] = "Password tidak boleh kosong.";
    }


    if (empty($error)) {
        $stmt = mysqli_prepare($koneksi, "SELECT id, password FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if ($password === $row['password']) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $username;
                echo "<script> alert('Login Berhasil!'); window.location.href = '../../index.php'; </script>";
                exit();
            } else {
                $error['login'] = "Password yang Anda masukkan salah.";
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<?php if (!empty($error)): ?>
    <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        <?php foreach ($error as $e): ?>
            <p style="margin: 5px 0;">&#x26A0; <?php echo htmlspecialchars($e); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>