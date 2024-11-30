@props([
    'formItems' => [
        [
            'id' => 'email',
            'label' => 'Email Address',
        ],
        [
            'id' => 'password',
            'label' => 'Password',
        ],
    ],
])

<x-admin-layout>
    <x-auth-layout formId="admin-login" title="admin" :formItems="$formItems" />

    <script>
        const formAdminLogin = document.querySelector('#admin-login');
        formAdminLogin.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;
            try {
                const response = await axios.post('http://localhost:3000/api/admin/login', {
                    email,
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
                    window.location.replace('http://127.0.0.1:8000/admin/dashboard')
                }
            } catch (error) {
                alert(error.response.data.errors);
            }
        });
    </script>
</x-admin-layout>
