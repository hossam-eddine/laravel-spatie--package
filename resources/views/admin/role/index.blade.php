<x-admin-layout>


    <div class="mt-5 py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-b border-gray-200">
                    <div class="flex justify-end">
                        <a href="{{ route('admin.roles.create') }}"
                            class="bg-blue-700 p-2 text-white  font-bold mb-3 rounded-md hover:bg-blue-400 ">Create
                            Role</a>
                    </div>
                    <div class="overflow-x-auto relative  ">
                        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400 dark:bg-gray-900 rounded-md">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3  text-center ">
                                        Role name
                                    </th>

                                    <th scope="col" class="py-3 text-center">
                                        Actions
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )

                                <tr class="bg-white border-2 dark:bg-transparent  dark:border-gray-700">



                                    <td class="py-4 px-6  border-gray-800">
                                        {{ $role->name }}
                                    </td>
                                    <td class="  py-4 px-6">
                                        <div class="flex items-center justify-end">

                                            <a href="{{route('admin.roles.edit',$role->id)}}" class="bg-green-600 hover:bg-green-500 px-4 py-2 text-white mr-3 rounded-md" href="">Edit</a>
                                            <form method="POST" action="{{ route('admin.roles.destroy',$role->id) }}">
                                                @csrf
                                                @method('Delete')
                                                <button onclick="return confirm('are you sur to deleted record')" class="bg-red-600 hover:bg-red-500 px-4 py-2 text-white rounded-md " href="">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
