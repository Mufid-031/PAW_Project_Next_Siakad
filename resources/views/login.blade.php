<x-layout class="flex justify-center items-center">
    <x-form
        id="login-form"
    >
    
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
                })
                .then((response) => {
                    console.log(response.data);
                });

            } catch (error) {
                console.error(error.response?.data.message || error.message);
            }
        });



    </script>

</x-layout>
