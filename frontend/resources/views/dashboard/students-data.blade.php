<x-layout>
    <x-admin-layout>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 md:ml-64 h-auto pt-20">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @if ( $students )
                        @foreach ($students['data'] as $student )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th id="student-detail" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-pointer">
                                    <a href="/dashboard/students/{{ $student['id'] }}">
                                        {{ $student['name'] }}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $student['student']['nim'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student['role'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student['email'] }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <p data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="edit-student" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer {{ $student['id'] }}">Edit</p>
                                    <div class="w-0.5 h-4 bg-gray-200"></div>
                                    <p id="delete-student" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer {{ $student['id'] }}">Delete</p>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </th>
                            <td class="px-6 py-4">
                                
                            </td>
                            <td class="px-6 py-4">
                                
                            </td>
                            <td class="px-6 py-4">
                                
                            </td>
                            <td class="px-6 py-4">
                                
                            </td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>

        <x-modal id="authentication-modal" role="edit-student" />
    
    </x-admin-layout>


    <script>
        
        const editStudent = document.querySelectorAll('#edit-student');
        let idStudent;
        let nameStudent;
        let roleStudent;
        let emailStudent;
        let nameModal;
        let emailModal;

        editStudent.forEach((element) => {
            element.addEventListener('click', () => {
                idStudent = element.classList[5];
                nameStudent = element.parentElement.parentElement.children[0];
                roleStudent = element.parentElement.parentElement.children[2];
                emailStudent = element.parentElement.parentElement.children[3];
                nameModal = document.querySelector('#name');
                emailModal = document.querySelector('#email');

                console.log(idStudent);
                
                nameModal.value = nameStudent.innerText;
                emailModal.value = emailStudent.innerText;
            });
        });

        const editForm = document.querySelector('#edit-student-form');

        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const id = idStudent;
            const name = nameModal.value;
            const email = emailModal.value;

            try {

                const token = await axios.post('/token/get-token');

                if (!token) {
                    console.log('Token not found');
                    return;
                };

                const response = await axios.patch('http://localhost:3000/api/admin', {
                    id,
                    name,
                    email,
                    role: roleStudent.innerText
                    }, {
                        headers: {
                        'X-API-TOKEN': `${token.data}`
                        }
                    });;

                if (response.status === 201) {
                    location.reload();
                };
            } catch (error) {
                console.error(error.response?.data || error.message);
            }
        });

        const deleteStudent = document.querySelectorAll('#delete-student');

        deleteStudent.forEach((element) => {
            element.addEventListener('click', async () => {
                const id = element.classList[5];
                console.log(id);
                try {
                    const token = await axios.post('/token/get-token');

                    if (!token) {
                        console.log('Token not found');
                        return;
                    };

                    console.log(token);

                    const response = await axios.delete(`http://localhost:3000/api/students/${id}`, {
                        headers: {
                            'X-API-TOKEN': `${token.data}`
                        }
                    });

                    if (response.status === 200) {
                        location.reload();
                    };
                } catch (error) {
                    console.error(error.response?.data || error.message);
                }
            });
        });

    </script>


</x-layout>