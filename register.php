<?php
// MySQL �����ͺ��̽� ����
$servername = "localhost";
$username = "root"; // MySQL ����� �̸�
$password = ""; // MySQL ��й�ȣ
$dbname = "user_db"; // ����� �����ͺ��̽� �̸�

// MySQL ���� ����
$conn = new mysqli($servername, $username, $password, $dbname);

// ���� Ȯ��
if ($conn->connect_error) {
    die("���� ����: " . $conn->connect_error);
}

// ������ ���� ������ ó��
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // �н����� �ؽ� (���� ó��)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL ���� �غ�
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

    // �غ�� ���� ����
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        // ���� ����
        if ($stmt->execute()) {
            echo "ȸ������ ����!";
        } else {
            echo "����: " . $stmt->error;
        }

        // ������Ʈ��Ʈ ����
        $stmt->close();
    } else {
        echo "���� �غ� ����: " . $conn->error;
    }
}

// MySQL ���� ����
$conn->close();
?>
