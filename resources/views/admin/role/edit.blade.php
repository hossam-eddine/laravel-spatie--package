<x-admin-layout>
    <div class="mt-5 py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-b border-gray-200">
                    <div class="   my-2 mx-4 md:mx-0">
                        <form method="POST" action="{{ route('admin.roles.update',$role->id) }}"
                            class="w-full max-w-xl bg-white rounded-lg  p-6">
                            @csrf
                            @method('put')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Role Name</label>
                                    <input name="name" value="{{ $role->name }}" placeholder="@error('name')
                                 {{ $message}}

                                 @enderror"
                                        class="@error('name')
                                    border-red-500
                                 @enderror appearance-none block w-full bg-white text-gray-900 font-medium border focus:border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        type='text'>
                                </div>



                                <div class="  px-3 ">
                                    <button
                                        class="appearance-none block w-full bg-green-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-500 focus:outline-none focus:bg-white focus:border-gray-500">Update</button>
                                </div>

                            </div>

                        </form>
                        <div class=" mt-2 mx-4">
                            <h2 class="font-bold mb-2">Role Permission:</h2>
                            @if (count($role->permissions)>0)
                            <div class="flex flex-wrap gap-2 ">
                                @foreach ($role->permissions as $role_permission )
                                <div id="toast-default"
                                    class="flex   p-4  text-gray-500  rounded-lg shadow-lg  bg-slate-200" role="alert">

                                    <div class="ml-3 text-sm font-normal mr-2">{{ $role_permission->name }}</div>

                                    <form method="POST"
                                        action="{{ route('admin.roles.permissions.revoke',[$role->id,$role_permission->id]) }}"
                                        class=" ml-3  -my-1.5"
                                        onsubmit="return confirm('Are You Sure You Want to Revoke it ')">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit"
                                            class=" bg-slate-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 "
                                            data-dismiss-target="#toast-default" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                @endforeach
                            </div>
                            @else
                            <span class="px-4 py-2 border bg-gray-200">Permission Not Assigned yet</span>

                            @endif



                        </div>
                    </div>

                    <div class="my-2 mx-4 md:mx-0">
                        <form method="POST" action="{{ route('admin.roles.permissions',$role->id) }}"
                            class="w-full max-w-xl bg-white rounded-lg  p-6">
                            @csrf

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label for="countries"
                                        class="block mb-2  uppercase tracking-wide text-xs font-bold text-gray-700">Select
                                        an option</label>
                                    <select id="permissions" name="permission"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Choose a permission</option>
                                        @foreach ($permissions as $permission )

                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach

                                    </select>





                                </div>
                                <div class="  px-3 mb-6">
                                    <button
                                        class="appearance-none block w-full bg-green-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-500 focus:outline-none focus:bg-white focus:border-gray-500">Assign</button>
                                </div>


                        </form>

                    </div>

















                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
