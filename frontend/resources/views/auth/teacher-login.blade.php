@props([
    'formItems' => [
        [
            'id' => 'nip',
            'label' => 'NIP',
        ],
        [
            'id' => 'password',
            'label' => 'Password',
        ],
    ],
])

<x-admin-layout>
    <x-auth-layout formId="teacher-login" title="teacher" :formItems="$formItems" />

    <script>
        const formTeacherLogin = document.querySelector('#teacher-login');
        formTeacherLogin.addEventListener('submit', async (e) => {
            e.preventDefault();
            const nip = document.querySelector('#nip').value;
            const password = document.querySelector('#password').value;
            try {
                const response = await axios.post('http://localhost:3000/api/user/login', {
                    credential: nip,
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
