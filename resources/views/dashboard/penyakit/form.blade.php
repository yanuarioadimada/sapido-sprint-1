<x-dashboard-layout>

    <form action="{{route('penyakit.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="nomor_hewan" class="{{$errors->has('nomor_hewan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Nomor Hewan</label>
            <select name="id_hewan" id="nomor_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Pilih no Hewan</option>
                @foreach ($hewan as $item)
                    <option value="{{$item->id}}">{{$item->nomor_hewan}}</option>
                @endforeach
                
            </select>
            @if($errors->has('id_hewan'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('nomor_hewan')}}</p>
            @endif
        </div>
        <div class="mb-6">
            <label for="gejala" class="{{$errors->has('gejala') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Gejala</label>
            <input name="gejala" type="text" id="nomor_hewan" class="{{$errors->has('gejala') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="contoh: Nafsu makan sapi berkurang" required />
            @if($errors->has('gejala'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('gejala')}}</p>
            @endif
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload gambar</label>
            <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div> 
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: Umur sapi 2 tahun"></textarea>
        </div> 
    
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    
    </x-dashboard-layout>