<x-layout class="flex justify-center items-center">
    <x-form
        id="register-form"
    >

        <x-form.description>
            Register Student
        </x-form.description>

        <x-form.item>
            <x-form.label>Name</x-form.label>
            <x-input
                x-form:control
                placeholder="Your name"
                class="w-96"
                name="name"
                id="name"
            />
            <x-form.message />
        </x-form.item>
    
    
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
            <x-form.label>Email</x-form.label>
            <x-input 
                x-form:control
                type="email"
                placeholder="Your email address"
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
    
        <x-button type="submit" @click="console.log('clicked')">Register</x-button>
    </x-form>

    <div id="alert-info"></div>
    
    
    
    <script>

        const formRegister = document.getElementById("register-form");

        formRegister.addEventListener("submit", async (e) => {
            
            e.preventDefault();

            const name = formRegister.name.value;
            const email = formRegister.email.value;
            const password = formRegister.password.value;
            const nim = formRegister.nim.value;

            console.log(name, email, password, nim);

            try {
                const response = await axios.post('http://localhost:3000/api/students/register', {
                    name,
                    email,
                    password,
                    nim
                });

                if (response.status === 200) {
                    const alertInfo = document.getElementById("alert-info");
                    alertInfo.innerHTML = `<x-alert variant="success">
                                                <x-lucide-rocket class="size-4" />
                                                <x-alert.title>Register Success</x-alert.title>
                                                <x-alert.description>
                                                    Now you can login with your credentials
                                                </x-alert.description>
                                            </x-alert>
                                        `;
                }

            } catch (error) {
                console.error(error.response?.data || error.message);
                const alertInfo = document.getElementById("alert-info");
                    alertInfo.innerHTML = `<x-alert variant="destructive">
                                                <x-lucide-triangle-alert class="size-4" />
                                                <x-alert.title>Register Failed</x-alert.title>
                                                <x-alert.description>
                                                    Please check your credentials
                                                </x-alert.description>
                                            </x-alert>
                                        `;
            }
        });



    </script>

</x-layout>
