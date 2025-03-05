<?php
// MySQL 데이터베이스 연결
$servername = "localhost";
$username = "root"; // MySQL 사용자 이름
$password = ""; // MySQL 비밀번호
$dbname = "user_db"; // 사용할 데이터베이스 이름

// MySQL 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// 폼에서 받은 데이터 처리
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 패스워드 해싱 (보안 처리)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL 쿼리 준비
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

    // 준비된 쿼리 실행
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        // 쿼리 실행
        if ($stmt->execute()) {
            echo "회원가입 성공!";
        } else {
            echo "에러: " . $stmt->error;
        }

        // 스테이트먼트 종료
        $stmt->close();
    } else {
        echo "쿼리 준비 실패: " . $conn->error;
    }
}

// MySQL 연결 종료
$conn->close();
?>
