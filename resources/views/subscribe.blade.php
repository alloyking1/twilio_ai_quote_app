<x-layout>
    <div class="rounded shadow-xl p-6 bg-white text-grey-50 mt-[20%]">
        <div class="my-2">
            <h2 class="text-3xl font-bold text-gray-500">Add a phone number to list</h2>
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-2">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('list.join') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                  Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                 name="name" 
                 type="text" 
                 placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                  Phone Number
                  <div class="font-thin">Enter phone number with country code without the (+) sight</div>
                  <div class="font-thin">Eg: 123XXXXXXX not +123XXXXXXX</div>
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                 name="phone" 
                 type="number" 
                 placeholder="Phone number">
              </div>
              <div class="mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Join List
                  </button>
              </div>
        </form>
    </div>
</x-layout>