@props([
    'formItems' => [
        [
            'id' => 'credential',
            'label' => 'Email | NIP | NIM',
        ],
        [
            'id' => 'password',
            'label' => 'Password',
        ],
    ],
])

<x-admin-layout>
    <x-auth-layout formId="login" title="credential" :formItems="$formItems" />

    <script>
        const formAdminLogin = document.querySelector('#login');
        formAdminLogin.addEventListener('submit', async (e) => {
            e.preventDefault();
            const credential = document.querySelector('#credential').value;
            const password = document.querySelector('#password').value;
            try {
                const response = await axios.post('http://localhost:3000/api/user/login', {
                    credential,
                    password
                }).then(data => data.data);
                if (response.status === 200) {
                    const token = await response.data.token
                    await axios.post('/token/save-token', {
                        token: token,
                    }).then((response) => {
                        console.log(response);
                    }).catch((error) => {
                        console.error(error.response.data.message || error.message);
                    });
                    if (response.data.role === 'ADMIN') {
                        window.location.replace('http://127.0.0.1:8000/admin/dashboard')
                    } else if (response.data.role === 'TEACHER') {
                        window.location.replace('http://127.0.0.1:8000/teacher/dashboard')
                    } else if (response.data.role === 'STUDENT') {
                        window.location.replace('http://127.0.0.1:8000/student/dashboard')
                    }
                }
            } catch (error) {
                alert(error.response.data.errors);
            }
        });
    </script>
</x-admin-layout>
