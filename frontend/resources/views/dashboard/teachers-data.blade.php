{{-- {{ dd($teachers) }} --}}

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
                    @if ( $teachers )
                        @foreach ($teachers['data'] as $teacher )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th id="teacher-detail" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-pointer">
                                    <a href="/dashboard/teachers/{{ $teacher['id'] }}">
                                        {{ $teacher['name'] }}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $teacher['teacher']['nip'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $teacher['role'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $teacher['email'] }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <p data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="edit-teacher" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer {{ $teacher['id'] }}">Edit</p>
                                    <div class="w-0.5 h-4 bg-gray-200"></div>
                                    <p id="delete-teacher" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer {{ $teacher['id'] }}">Delete</p>
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
                <tfoot class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 py-10">
                        <td colspan="5">
                            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded w-full" id="add-teacher">Add Teacher</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <x-modal id="authentication-modal" role="edit-teacher" />

        <x-modal id="add-teacher-modal" role="add-teacher" />
        
    </x-admin-layout>


    <script>
        
        const editteacher = document.querySelectorAll('#edit-teacher');
        let idteacher;
        let nameteacher;
        let roleteacher;
        let emailteacher;
        let nameModal;
        let emailModal;

        editteacher.forEach((element) => {
            element.addEventListener('click', () => {
                idteacher = element.classList[5];
                nameteacher = element.parentElement.parentElement.children[0];
                roleteacher = element.parentElement.parentElement.children[2];
                emailteacher = element.parentElement.parentElement.children[3];
                nameModal = document.querySelector('#name');
                emailModal = document.querySelector('#email');

                console.log(idteacher);
                
                nameModal.value = nameteacher.innerText;
                emailModal.value = emailteacher.innerText;
            });
        });

        const editForm = document.querySelector('#edit-teacher-form');

        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const id = idteacher;
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
                    role: roleteacher.innerText
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

        const deleteTeacher = document.querySelectorAll('#delete-teacher');

        deleteTeacher.forEach((element) => {
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

                    const response = await axios.delete(`http://localhost:3000/api/teachers/${id}`, {
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

        const addTeacher = document.querySelector('#add-teacher-form');

        addTeacher.addEventListener('click', () => {
            nameModal.value = '';
            emailModal.value = '';
        });

    </script>


</x-layout>