@props([
    'description' => 'Login',
    'role' => 'Admin',
    'formItems' => [
        [
            'label' => 'Email',
            'name' => 'email',
            'id' => 'email'
        ],
        [
            'label' => 'Password',
            'name' => 'password',
            'id' => 'password'
        ]
    ],
])
<x-layout class="flex justify-center items-center">
    
    <x-auth-layout description="Login" role="Admin" :formItems="$formItems" />
    
    <script>
    
        const formLogin = document.getElementById("login-form");
    
        formLogin.addEventListener("submit", async (e) => {
            
            e.preventDefault();
    
            const email = formLogin.email.value;
            const password = formLogin.password.value;
    
            try {
                const response = await axios.post('http://localhost:3000/api/admin/login', {
                    email,
                    password
                });
                
    
                if (response.status === 200) {
                    const alertInfo = document.getElementById("alert-info");
                    alertInfo.innerHTML = `<x-alert variant="success">
                                                <x-lucide-rocket class="size-4" />
                                                <x-alert.title>Login Success</x-alert.title>
                                                <x-alert.description>
                                                    Welcome ${response.data.name}
                                                </x-alert.description>
                                            </x-alert>
                                        `;
    
                    
    
                    const token = await response.data.data.token;
                    console.log(token);
    
                    await axios.post('/token/save-token', {
                        token: token
                    }).then((response) => {
                        console.log(response.data.message);
                    }).catch((error) => {
                        console.error(error.response.data.message || error.message);
                    });
    
                    window.location.replace('http://next-siakad-new.test:30/dashboard/students');
                }
    
            } catch (error) {
                console.error(error.response?.message || error.message);
                const alertInfo = document.getElementById("alert-info");
                    alertInfo.innerHTML = `<x-alert variant="destructive">
                                                <x-lucide-triangle-alert class="size-4" />
                                                <x-alert.title>Login Failed</x-alert.title>
                                                <x-alert.description>
                                                    Please check your credentials
                                                </x-alert.description>
                                            </x-alert>
                                        `;
            }
        });
        
    
    </script>

</x-layout>


