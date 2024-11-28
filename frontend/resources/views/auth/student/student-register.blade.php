@props([
    'description' => 'Register',
    'role' => 'Student',
    'formItems' => [
        [
            'label' => 'Name',
            'name' => 'name',
            'id' => 'name'
        ],
        [
            'label' => 'NIM',
            'name' => 'nim',
            'id' => 'nim'
        ],
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

    <x-auth-layout description="Register" role="Student" :formItems="$formItems" />

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
                const response = await axios.post('http://localhost:3000/api/student/register', {
                    name,
                    email,
                    password,
                    nim
                });

                if (response.status === 201) {
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
