{{-- {{ dd($token) }} --}}
{{-- {{ dd($students) }} --}}


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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student['user']['name'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $student['nim'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student['user']['role'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student['user']['email'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <p data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="edit-student" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer {{ $student['id'] }}">Edit</p>
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

        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Student
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-4 md:p-5">
                        <form id="edit-student-form" class="space-y-4" action="#">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                                <input type="name" name="name" id="name" value=${nameStudent.innerText} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" value=${emailStudent.innerText} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        
  
    
    </x-admin-layout>


    <script>

        // window.addEventListener("DOMContentLoaded", async () => {
        //     const tableBody = document.querySelector('#table-body');

        //     try {
                
        //         const token = await axios.post('/get-token');

        //         const response = await axios.get('http://localhost:3000/api/students', {}, {
        //             headers: {
        //                 'X-API-TOKEN': token.data
        //             }
        //         });

        //         if (response.status === 200) {

        //             const tableStudents = response.data.forEach((student) => {
        //                 return `
        //                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        //                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        //                             ${student.user.name}
        //                         </th>
        //                         <td class="px-6 py-4">
        //                             ${student.nim}
        //                         </td>
        //                         <td class="px-6 py-4">
        //                             ${student.user.role}
        //                         </td>
        //                         <td class="px-6 py-4">
        //                             ${student.user.email}
        //                         </td>
        //                         <td class="px-6 py-4">
        //                             <p data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="edit-student" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer ${student.user.id}">Edit</p>
        //                         </td>
        //                     </tr>
        //                 `;
        //             });

        //             tableBody.appendChild(tableStudents);
        //         }
        //     } catch (error) {
        //         console.error(error.response?.data || error.message);
        //     }
        // });
        
        const editStudent = document.querySelectorAll('#edit-student');
        let idStudent;
        let nameStudent;
        let emailStudent;
        let nameModal;
        let emailModal;

        editStudent.forEach((element) => {
            element.addEventListener('click', () => {
                idStudent = element.classList[5];
                nameStudent = element.parentElement.parentElement.children[0];
                emailStudent = element.parentElement.parentElement.children[3];
                nameModal = document.querySelector('#name');
                emailModal = document.querySelector('#email');
                
                nameModal.value = nameStudent.innerText;
                emailModal.value = emailStudent.innerText;
            });
        });

        const editForm = document.querySelector('#edit-student-form');

        editForm.addEventListener('submit', async () => {
            const id = Number(idStudent);
            const name = nameModal.value;
            const email = emailModal.value;

            try {

                const token = await axios.post('/get-token');

                if (!token) {
                    console.log('Token not found');
                    return;
                };

                let response;

                if (nameStudent.innerText !== name) {
                    response = await axios.patch('http://localhost:3000/api/admin', {
                    id,
                    name,
                    }, {
                        headers: {
                        'X-API-TOKEN': token.data
                        }
                    });
                } else if (emailStudent.innerText !== email) {
                    response = await axios.patch('http://localhost:3000/api/admin', {
                    id,
                    email,
                    }, {
                        headers: {
                        'X-API-TOKEN': `${token.data}`
                        }
                    });
                } else {
                    response = await axios.patch('http://localhost:3000/api/admin', {
                    id,
                    name,
                    email,
                    }, {
                        headers: {
                        'X-API-TOKEN': `${token.data}`
                        }
                    });
                }

                if (response.status === 200) {
                    console.log('Success');
                };
            } catch (error) {
                console.error(error.response?.data || error.message);
            }
        });

    </script>


</x-layout>