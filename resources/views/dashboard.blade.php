<script src="chart.umd.js"></script>
<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>

        <!-- collapsable table for overdued billings -->

        <div x-data="{ open: false }" class="bg-white shadow rounded-lg p-6 mb-6">

            <!-- Header + Toggle -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Overdue Billings</h2>

                <button
                    @click="open = !open"
                    class="text-sm text-blue-600 hover:underline flex items-center gap-1">

                    <span x-text="{{ $totalOverdueBillings }}"></span>

                    <!-- Arrow -->
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Table -->
            <div x-show="open" x-transition class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Control #</th>
                            <th class="px-4 py-2">Employer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($overdueBillings as $billing)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $billing->control_number }}</td>
                                <td class="px-4 py-2">{{ $billing->employer->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    &#8369;{{ number_format($billing->amount, 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>




        <!-- Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Total Employer with Billings</div>
                <div class="text-2xl font-bold">{{ $totalEmployers }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Total Billings</div>
                <div class="text-2xl font-bold">{{ $totalBillings }}</div>
            </div>
        </div>

        <!-- collapsable table for issued billings -->
        <div x-data="{ open: false }" class="bg-white shadow rounded-lg p-6 mb-6">

            <!-- Header + Toggle -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Issued Billings</h2>

                <button
                    @click="open = !open"
                    class="text-sm text-blue-600 hover:underline flex items-center gap-1">

                    <span x-text="{{ $totalIssuedBillings }}"></span>

                    <!-- Arrow -->
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Table -->
            <div x-show="open" x-transition class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Control #</th>
                            <th class="px-4 py-2">Employer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issuedBillings as $billing)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $billing->control_number }}</td>
                                <td class="px-4 py-2">{{ $billing->employer->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    &#8369;{{ number_format($billing->amount, 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


        <!-- collapsable table for Generated billings -->
        <div x-data="{ open: false }" class="bg-white shadow rounded-lg p-6 mb-6">

            <!-- Header + Toggle -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Generated Billings</h2>

                <button
                    @click="open = !open"
                    class="text-sm text-blue-600 hover:underline flex items-center gap-1">

                    <span x-text="{{ $totalGeneratedBillings }}"></span>

                    <!-- Arrow -->
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Table -->
            <div x-show="open" x-transition class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Control #</th>
                            <th class="px-4 py-2">Employer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($generatedBillings as $billing)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $billing->control_number }}</td>
                                <td class="px-4 py-2">{{ $billing->employer->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    &#8369;{{ number_format($billing->amount, 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- collapsable table for Case-Folder billings -->
        <div x-data="{ open: false }" class="bg-white shadow rounded-lg p-6 mb-6">

            <!-- Header + Toggle -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Case Folder Billings</h2>

                <button
                    @click="open = !open"
                    class="text-sm text-blue-600 hover:underline flex items-center gap-1">

                    <span x-text="{{ $totalCaseFolderBillings }}"></span>

                    <!-- Arrow -->
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Table -->
            <div x-show="open" x-transition class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Control #</th>
                            <th class="px-4 py-2">Employer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($caseFolderBillings as $billing)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $billing->control_number }}</td>
                                <td class="px-4 py-2">{{ $billing->employer->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    &#8369;{{ number_format($billing->amount, 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- collapsable table for Settled billings -->
        <div x-data="{ open: false }" class="bg-white shadow rounded-lg p-6 mb-6">

            <!-- Header + Toggle -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Settled Billings</h2>

                <button
                    @click="open = !open"
                    class="text-sm text-blue-600 hover:underline flex items-center gap-1">

                    <span x-text="{{ $totalSettledBillings }}"></span>

                    <!-- Arrow -->
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Table -->
            <div x-show="open" x-transition class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Control #</th>
                            <th class="px-4 py-2">Employer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settledBillings as $billing)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $billing->control_number }}</td>
                                <td class="px-4 py-2">{{ $billing->employer->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    &#8369;{{ number_format($billing->amount, 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- this the pie chart for billings classification -->
        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-lg font-bold mb-4">Billings</h2>
            <div style="max-width: 400px; margin: auto;">
                <canvas id="billingChart"></canvas>
            </div>
        </div>

        <script>
    const billingCtx = document.getElementById('billingChart').getContext('2d');
    const billingChart = new Chart(billingCtx, {
        type: 'pie',
        data: {
            labels: @json($statusLabels),
            datasets: [{
                data: @json($statusCounts),
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(21, 216, 151, 0.7)',
                    'rgba(251, 191, 36, 0.7)',
                    'rgba(239, 68, 68, 0.7)'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
        
        <!-- this the pie chart for employer classification -->
        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-lg font-bold mb-4">Employer Classification Distribution</h2>
            <div style="max-width: 400px; margin: auto;">
                <canvas id="employerTypeChart"></canvas>
            </div>
        </div>

        <script>
            const employerCtx = document.getElementById('employerTypeChart').getContext('2d');
            const employerChart = new Chart(employerCtx, {
                type: 'pie',
                data: {
                    labels: @json($typeLabels),
                    datasets: [{
                        data: @json($typeCounts),
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(21, 216, 151, 0.7)',
                            'rgba(251, 191, 36, 0.7)',
                            'rgba(239, 68, 68, 0.7)'
                        ],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        </script>

        <!-- Summary Cards for AMS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6 mb-6">
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Total Accountload as of {{$latestImportedData}}</div>
                <div class="text-2xl font-bold">{{ $totalAccountLoad }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Remitting as of {{$latestImportedData}}</div>
                <div class="text-2xl font-bold">{{ $totalRemitting }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Delinquent as of {{$latestImportedData}}</div>
                <div class="text-2xl font-bold">{{ $totalDelinquent }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Non-remitting as of {{$latestImportedData}}</div>
                <div class="text-2xl font-bold">{{ $totalNonRemitting }}</div>
            </div>
        </div>

        <!-- this the pie chart for ams status -->
        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-lg font-bold mb-4">Accout load status as of {{$latestImportedData}} </h2>
            <div style="max-width: 400px; margin: auto;">
                <canvas id="amsStatusChart"></canvas>
            </div>
        </div>

        <script>
            const amsCtx = document.getElementById('amsStatusChart').getContext('2d');
            const amsChart = new Chart(amsCtx, {
                type: 'pie',
                data: {
                    labels: @json($loadLabels),
                    datasets: [{
                        data: @json($loadCounts),
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(21, 216, 151, 0.7)',
                            'rgba(251, 191, 36, 0.7)',
                            'rgba(239, 68, 68, 0.7)'
                        ],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        </script>

    </div>
    
</x-app-layout>
