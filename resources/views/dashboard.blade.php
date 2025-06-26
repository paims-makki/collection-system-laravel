<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Total Employers</div>
                <div class="text-2xl font-bold">{{ $totalEmployers }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Total Billings</div>
                <div class="text-2xl font-bold">{{ $totalBillings }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Issued Billings</div>
                <div class="text-2xl font-bold">{{ $issuedBillings }}</div>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <div class="text-gray-500">Generated Billings</div>
                <div class="text-2xl font-bold">{{ $generatedBillings }}</div>
            </div>
        </div>

        <!-- Recent Billings -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Overdue Billings</h2>
            <div class="overflow-x-auto">
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
                                <td class="px-4 py-2">&#8369;{{ number_format($billing->amount, 2) }}</td>
                                <td class="px-4 py-2">{{ $billing->status }}</td>
                                <td class="px-4 py-2">{{ $billing->status_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-lg font-bold mb-4">Employer Classification Distribution</h2>
            <div style="max-width: 400px; margin: auto;">
                <canvas id="employerTypeChart"></canvas>
            </div>
        </div>

        <script>
            const typeCtx = document.getElementById('employerTypeChart').getContext('2d');
            const employerTypeChart = new Chart(typeCtx, {
                type: 'pie',
                data: {
                labels: @json($typeLabels),
                datasets: [{
                    data: @json($typeCounts),
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)', // blue
                        'rgba(21, 216, 151, 0.7)', // green
                        'rgba(251, 191, 36, 0.7)', // yellow
                        'rgba(239, 68, 68, 0.7)'   // red (extra if needed)
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    </div>
</x-app-layout>
