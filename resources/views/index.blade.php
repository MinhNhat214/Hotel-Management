@include('layouts.app')

@include('layouts.header')


<div class="h-96 bg-slate-500">

</div>

<div class="flex justify-between p-20">
    <div class="bg-slate-500 w-1/2 ">

    </div>
    <form method="POST" action="">
        <p class="text-center font-medium text-2xl pb-10">ĐẶT NGAY</p>
        {{-- <div class="grid gap-6 mb-6 md:grid-cols-2"> --}}
        <div class="py-3">
            <label for="roomtype" class="block mb-2 text-sm font-medium text-gray-900">
                Dạng phòng
            </label>
            <select name="roomtype" id="roomtype" aria-label="Default select"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4+</option>
            </select>
        </div>
        <div class="py-3">
            <label for="fromdate" class="block mb-2 text-sm font-medium text-gray-900">Chọn ngày</label>
            <div id="date-range-picker" date-rangepicker class="flex items-center">
                <input type="date" name="fromdate" id="fromdate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <span class="mx-4 text-gray-500">Đến</span>

                <input type="date" name="todate" id="todate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
        </div>

        <div class="py-3">
            <label for="roomnumber" class="block mb-2 text-sm font-medium text-gray-900">Số
                phòng</label>
            <select name="roomnumber" id="roomnumber" aria-label="Default select"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">1</option>
                <option value="">2</option>
            </select>
        </div>

        <div class="py-3">
            <label for="countuser" class="block mb-2 text-sm font-medium text-gray-900">Số khách</label>
            <select name="countuser" id="countuser" aria-label="Default select"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4+</option>
            </select>
        </div>

        {{-- <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                    required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900">
                Tôi đồng ý với
                <a href="#" class="text-blue-600 hover:underline">
                    các điều khoản và dịch vụ
                </a>.
            </label>
        </div> --}}
        <button type="submit"
            class=" mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Đặt
            phòng</button>
    </form>
</div>


<div>
    ko
</div>
</body>

</html>
