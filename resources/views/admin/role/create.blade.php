<x-admin-layout>
    <div class="mt-5 py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-b border-gray-200">
                    <div class="flex justify-center my-2 mx-4 md:mx-0">
                        <form method="POST" action="{{ route('admin.roles.store') }}" class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                           @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                              <div class="w-full md:w-full px-3 mb-6">
                                 <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Role Name</label>
                                 <input   name="name" placeholder="@error('name')
                                 {{ $message}}

                                 @enderror" class="@error('name')
                                    border-red-500
                                 @enderror appearance-none block w-full bg-white text-gray-900 font-medium border focus:border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='text'  >
                              </div>



                              <div class="w-full md:w-full px-3 mb-6">
                                 <button class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Create </button>
                              </div>

                           </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
