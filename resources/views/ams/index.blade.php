<!-- resources/views/ams/index.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Accounts Monitoring</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('ams.index') }}"
            class="mb-8 flex flex-col sm:flex-row sm:items-center gap-4 flex-wrap">

            <!-- Search Input -->
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, PEN, year, and status"
                class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" />

            <!-- Date Filter -->
            <div class="flex items-center gap-2">
                <label for="date" class="text-sm text-gray-600 font-medium">
                    Filter by Date:
                </label>

                <input type="text"
                    id="date"
                    name="date"
                    value="{{ request('date') }}"
                    class="px-3 py-2 border border-gray-300 rounded shadow-sm
                            focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Search Button -->
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Search
            </button>
        </form>



        <div class="mb-4">
            <a href="{{ route('ams.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Import AMS
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Name of Employer</th>
                        <th class="px-4 py-3">PEN</th>
                        <th class="px-4 py-3">January</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">February</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">March</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">April</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">May</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">June</th>
                        <th class="px-4 py-3">No of EEs</th>
                        <th class="px-4 py-3">July</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">August</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">September</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">October</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">November</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">December</th>
                        <th class="px-4 py-3">No. of EEs</th>
                        <th class="px-4 py-3">Remarks</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Reporting Month</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">updated at</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $record->employer_name }}</td>
                            <td class="px-4 py-2">{{ $record->pen }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->january, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->jan_ee}}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->february, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->feb_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->march, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->mar_ee}}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->april, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->apr_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->may, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->may_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->june, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->jun_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->july, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->jul_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->august, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->aug_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->september, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->sep_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->october, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->oct_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->november, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->nov_ee }}</td>
                            <td class="px-4 py-2">&#8369;{{ number_format($record->december, 2) }}</td>
                            <td class="px-4 py-2">{{ $record->dec_ee }}</td>
                            <td class="px-4 py-2">{{ $record->remarks }}</td>
                            <td class="px-4 py-2">{{ $record->status }}</td>
                            <td class="px-4 py-2">{{ $record->reporting_month }}</td>
                            <td class="px-4 py-2">{{ $record->type }}</td>
                            <td class="px-4 py-2">{{ $record->updated_at }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $records->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
