<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calculator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:w-fit shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   Do your math here :)
                </div>
            </div>

            <div class="bg-white mt-5 md:w-2/4 lg:w-2/6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 flex flex-col gap-y-2">
                    <p class="text-red-500 text-xs italic mb-3 validation-msg"></p>
                    <input type="text" class="border border-gray-300 min-h-16 rounded-lg pr-4 pt-2 text-right mr-6 w-full text-2xl overflow-auto" id="input" value="" placeholder="Type your problem" disabled readonly/>
                    <div class="flex flex-col gap-y-2">
                        <div class="operators grid grid-cols-3 max-md:gap-2 md:gap-2">
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">(</div>
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">)</div>
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">+</div>
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">-</div>
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">&times;</div>
                            <div class="calc-btn border border-solid border-gray-300 rounded-lg  text-center p-2 cursor-pointer bg-gray-200 transition-all duration-200 ease-in-out hover:border-[#c1d83a] hover:bg-[#c1d83a] hover:shadow-md">&divide;</div>
                        </div>
                        <div class="grid gap-x-3">
                            <div>
                                <div class="numbers grid grid-cols-3 gap-x-2.5">
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">7</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">8</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">9</div>
                                </div>
                                <div class="numbers grid grid-cols-3 gap-x-2.5">
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">4</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">5</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">6</div>
                                </div>
                                <div class="numbers grid grid-cols-3 gap-x-2.5">
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">1</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">2</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">3</div>
                                </div>
                                <div class="numbers grid grid-cols-3 gap-x-2.5">
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">0</div>
                                    <div class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">.</div>
                                </div>
                                <div class="numbers grid grid-cols-3 gap-x-2.5">
                                    <div class="back-space border border-solid border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-200 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out hover:shadow-md">←</div>
                                    <div id="clear" class="calc-btn border border-gray-300 rounded-lg  text-center p-2 mb-2 cursor-pointer bg-gray-100 hover:border-[#c1d83a] hover:bg-[#c1d83a] transition-all duration-200 ease-in-out">C</div>
                                </div>
                            </div>
                            <div id="result" class="border border-[#c1d83a] w-full rounded-lg p-2 text-center cursor-pointer text-white bg-[#c1d83a] flex items-center justify-center text-xl transition-all duration-200 ease-in-out">=</div>
                        </div>
                    </div>
                    <div class="">
                        <span class="text-white">Calculation results:</span>
                        <ul class="list-none user-results"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
