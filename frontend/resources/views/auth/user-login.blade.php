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

<x-layout class="bg-[url('/public/images/waves.svg')]">
    <x-auth-layout formId="login" title="credential" :formItems="$formItems" />

    <script>
        const formAdminLogin = document.querySelector('#login');
        formAdminLogin.addEventListener('submit', async (e) => {
            e.preventDefault();
            const creadential = document.querySelector('#credential').value;
            const password = document.querySelector('#password').value;
            console.log(creadential);
            try {
                const response = await axios.post('http://localhost:3000/api/user/login', {
                    creadential: creadential,
                    password: password,
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
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Welcome " + response.data.name,
                    });
                    if (response.data.role === 'ADMIN') {
                        window.location.replace('/admin/dashboard')
                    } else if (response.data.role === 'TEACHER') {
                        window.location.replace('/dosen/dashboard')
                    } else if (response.data.role === 'STUDENT') {
                        window.location.replace('/student/dashboard')
                    }
                }
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error.response.data.errors || error.message,
                });
            }
        });
    </script>
</x-layout>
