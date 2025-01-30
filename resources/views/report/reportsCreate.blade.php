<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать заявление') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Адрес:</label>
                            <input type="text" id="address" name="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700">Контакт:</label>
                            <input type="text" id="contact" name="contact" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Дата:</label>
                            <input type="date" id="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="time" class="block text-sm font-medium text-gray-700">Время:</label>
                            <input type="time" id="time" name="time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="payment" class="block text-sm font-medium text-gray-700">Способ оплаты:</label>
                            <input type="text" id="payment" name="payment" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="service_id" class="block text-sm font-medium text-gray-700">Услуга:</label>
                            <select name="service_id" id="service_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="1">общий клининг</option>
                                <option value="2">генеральная уборка</option>
                                <option value="3">послестроительная уборка</option>
                                <option value="4">химчистка ковров и мебели</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Загрузить изображение:</label>
                            <input type="file" id="photo" name="photo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <button type="submit" class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded">Создать заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>