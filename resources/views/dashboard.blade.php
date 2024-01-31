<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="display: flex; justify-content: space-around;">
                        <a href="">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4>Management</h4>
                                <img src="{{ asset('images/business-analyst.png') }}" width="50px">
                            </div>
                        </a>
                        <a href="">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4>Cashier</h4>
                                <img src="{{ asset('images/cash-machine.png') }}" width="50px">
                            </div>
                        </a>
                        <a href="">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4>Report</h4>
                                <img src="{{ asset('images/seo-report.png') }}" width="50px">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
