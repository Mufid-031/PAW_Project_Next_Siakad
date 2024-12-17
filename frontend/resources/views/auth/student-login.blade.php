@props([
    'formItems' => [
        [
            'id' => 'nim',
            'label' => 'NIM',
        ],
        [
            'id' => 'password',
            'label' => 'Password',
        ],
    ],
])

<x-admin-layout>
    <x-auth-layout formId="student-login" title="student" :formItems="$formItems" />

    <script>
        const formStudentLogin = document.querySelector('#student-login');
        formStudentLogin.addEventListener('submit', async (e) => {
            e.preventDefault();
            const nim = document.querySelector('#nim').value;
            const password = document.querySelector('#password').value;
            try {
                const response = await axios.post('http://localhost:3000/api/user/login', {
                    credential: nim,
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
                    window.location.replace('http://127.0.0.1:8000/student/dashboard')
                }
            } catch (error) {
                console.log(error);
            }
        });
    </script>
</x-admin-layout>
