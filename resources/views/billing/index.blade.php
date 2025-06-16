<!-- resources/views/billing/index.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Billings</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('billing.index') }}" class="mb-8 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, PEN, or Control Number"
                class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Search</button>
        </form>

        <div class="mb-4">
            <a href="{{ route('billing.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + New Billing
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Name of Employer</th>
                        <th class="px-4 py-3">PEN of Employer</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Applicable Period</th>
                        <th class="px-4 py-3">No. of Months</th>
                        <th class="px-4 py-3">Premium</th>
                        <th class="px-4 py-3">Interest</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Control Number</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Scanned file</th>
                        <th class="px-4 py-3">Latest</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billings as $billing)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $billing->employer->name }}</td>
                            <td class="px-4 py-2">{{ $billing->employer->PEN }}</td>
                            <td class="px-4 py-2">{{ $billing->amount }}</td>
                            <td class="px-4 py-2">{{ $billing->applicable_period }}</td>
                            <td class="px-4 py-2">{{ $billing->no_of_months }}</td>
                            <td class="px-4 py-2">{{ $billing->premium }}</td>
                            <td class="px-4 py-2">{{ $billing->interest }}</td>
                            <td class="px-4 py-2">{{ $billing->type }}</td>
                            <td class="px-4 py-2">{{ $billing->control_number }}</td>
                            <td class="px-4 py-2">{{ $billing->status }}</td>
                            <td>
                                @if ($billing->file_path)
                                <a href="{{ asset('storage/' . $billing->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                                 @else
                                    No file
                                 @endif
                            </td>
                            <td class="px-4 py-2">{{ $billing->latest }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('billing.edit', $billing) }}"
                                   class="text-blue-600 hover:underline px-4">Edit</a>
                                <form action="{{ route('billing.destroy', $billing) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $billings->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
