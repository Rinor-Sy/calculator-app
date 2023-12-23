<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calculation History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <p>Calculations History</p>
                    @if($userCalcData->isNotEmpty())
                        <button class="delete-all-calculations bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete Calculations
                        </button>
                    @endif
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto mt-8">
                        <table class="min-w-full border border-gray-300">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">User</th>
                                    <th class="py-2 px-4 border-b">Expression</th>
                                    <th class="py-2 px-4 border-b">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userCalcData as $item)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ auth()->user()->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->expression }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->result }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $userCalcData->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
