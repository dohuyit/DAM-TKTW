<?php
// Hàm connection dùng để kết nối đến CSDL
function pdo_get_connection()
{
    try {
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";port=" . PORT . ";charset=utf8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
        throw $e;
    }
}

// Hàm để render view
function viewAdmin($view, $data = [])
{
    extract($data);
    include_once "Views/Admin/$view.php";
}

function viewClients($view, $data = [])
{
    extract($data);
    include_once "Views/Clients/$view.php";
}

function showAlert()
{
    if (isset($_SESSION['alert'])) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script type='text/javascript'>
            window.onload = function() {
                Swal.fire({
                    title: '{$_SESSION['alert']['title']}',
                    text: '{$_SESSION['alert']['message']}',
                    icon: '{$_SESSION['alert']['type']}',
                    showConfirmButton: false,
                });
                setTimeout(function() {
                    window.location.href = '{$_SESSION['alert']['redirect']}';
                }, 1500);
            }
        </script>
        ";
        unset($_SESSION['alert']);
    }
}
