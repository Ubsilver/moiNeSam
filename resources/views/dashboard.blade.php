<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Заявления') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        @if (auth()->user()->role !== 'admin')
                        <div class="flex row justify-between">
                            <div></div>
                            <div class="border-2 border-gray-300 rounded-md p-2">
                                <x-nav-link :href="route('report.create')" :active="request()->routeIs('report.create')">
                                    {{ __('Создать заявление') }}
                                </x-nav-link>
                            </div>
                        </div>
                        @endif

                        @foreach($reports as $report)
                        <div class="bg-white shadow-md rounded-lg p-4 grid grid-cols-2 items-center border-2 border-gray-300">
                            <div>
                                <div class="flex row">
                                    @if (auth()->user()->role === 'admin')
                                    <p class="text-sm font-semibold">Пользователь: {{ $report->user->name }} {{ $report->user->middlename }}</p>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-lg mt-2">Адрес: {{ $report->address }}</p>
                                    <p class="text-lg  mt-2">Контакты: {{ $report->contact }}</p>
                                </div>
                                <p class="text-lg mt-2">Услуга: {{ $report->service->title }} </p>
                                <p class="text-lg mt-2">Дата и время: {{ $report->date }} / {{ $report->time }}</p>
                                <p class="text-lg mt-2">Оплата: {{ $report->payment }}</p>
                            </div>
                            @if (auth()->user()->role !== 'admin')
                            <div>
                                <p class="text-lg mt-2">Статус: {{ $report->status }}</p>
                                @if ($report->status === 'отменена')
                                <p class="text-lg mt-2">Причина отказа: <br>{{ $report->deny }}</p>
                                @endif
                                @isset($report->photo)
                                <img src="/images/{{$report->photo}}" alt=".">
                                @endisset
                            </div>
                            @endif
                            @if (auth()->user()->role === 'admin')
                            <form action="{{ route('reports.updateStatus', $report->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <p class="text-lg mt-2">Активный статус: {{ $report->status }}</p>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Статус:</label>
                                    <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="новая" {{ $report->status == 'новая' ? 'selected' : '' }}>Новая</option>
                                        <option value="оказана" {{ $report->status == 'оказана' ? 'selected' : '' }}>Оказана</option>
                                        <option value="отменена" {{ $report->status == 'отменена' ? 'selected' : '' }}>Отменена</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <label for="deny" class="block text-sm font-medium text-gray-700">Причина отказа:</label>
                                        <input type="textarea" id="deny" name="deny" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                        <button type="submit" class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded">Сохранить</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>