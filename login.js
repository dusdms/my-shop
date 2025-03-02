// 간단한 로그인 정보 (실제 환경에서는 서버에서 처리해야 합니다)
const validUser = {
    username: 'admin',
    password: 'password123'
};

// 로그인 함수
function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // 유효성 검증
    if (username === validUser.username && password === validUser.password) {
        // 로그인 성공
        alert('Login successful!');
        window.location.href = 'index.html'; // 로그인 후 홈페이지로 이동
    } else {
        // 로그인 실패
        document.getElementById('error-message').style.display = 'block';
    }
}
