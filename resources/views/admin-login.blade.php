{{-- {{ dd($getToken) }} --}}
{{-- {{ dd($token) }} --}}

<x-layout class="flex justify-center items-center">
    <x-form
        id="login-form"
    >

        <x-form.description>
            Login Admin
        </x-form.description>

        <div id="alert-info"></div>

    
        <x-form.item>
            <x-form.label>Email</x-form.label>
            <x-input 
                x-form:control
                placeholder="Your Email"
                class="w-96"
                name="email"
                id="email"
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
        <x-button id="destroy-token">Destroy Token</x-button>
    </x-form>   
    
    
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


        const destroyToken = document.querySelector("#destroy-token");

        destroyToken.addEventListener("click", async () => {

            try {
                
                const response = await axios.post("/destroy-token", {
                 'token': "3d04f6fa-1811-4a3e-9539-083ac0ec4e24"   
                });

                if (response.status === 200) {
                    console.log(response.data);
                }


            } catch (error) {
                console.error(error.response?.data.message || error.message);
            }

        });


    </script>

</x-layout>
