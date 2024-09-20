{{-- {{ dd($getToken) }} --}}
{{-- {{ dd($token) }} --}}

<x-layout class="flex justify-center items-center">
    <x-form
        id="login-form"
    >

        <x-form.description>
            Login Student
        </x-form.description>

        <div id="alert-info"></div>

    
        <x-form.item>
            <x-form.label>NIM</x-form.label>
            <x-input 
                x-form:control
                placeholder="Your NIM"
                class="w-96"
                name="nim"
                id="nim"
            />
            <x-form.message />
        </x-form.item>

    
        <x-form.item>
            <x-form.label>Password</x-form.label>
            <x-input
                x-form:control
                placeholder="Your password"
                class="w-96"
                type="password"
                name="password"
                id="password"
            />
            <x-form.message />
        </x-form.item>
    
        <x-button type="submit" @click="console.log('clicked')">Login</x-button>
    </x-form>   
    
    
    <script>

        const formLogin = document.getElementById("login-form");

        formLogin.addEventListener("submit", async (e) => {
            
            e.preventDefault();

            const nim = formLogin.nim.value;
            const password = formLogin.password.value;

            try {
                const response = await axios.post('http://localhost:3000/api/students/login', {
                    nim,
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

                    await axios.post('/save-token', {
                        token: token
                    }).then((response) => {
                        console.log(response.data.message);
                    }).catch((error) => {
                        console.error(error.response.data.message || error.message);
                    });
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
