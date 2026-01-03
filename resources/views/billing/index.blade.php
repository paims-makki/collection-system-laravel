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
                        <th class="px-4 py-3">Control Number</th>
                        <th class="px-4 py-3">Name of Employer</th>
                        <th class="px-4 py-3">PEN of Employer</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Applicable Period</th>
                        <th class="px-4 py-3">No. of Months</th>
                        <th class="px-4 py-3">Premium</th>
                        <th class="px-4 py-3">Interest</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Scanned file</th>
                        <th class="px-4 py-3">Remarks</th>
                        <th class="px-4 py-3">Latest</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                @foreach ($billings as $billing)
                <tbody x-data="{ open: false }">

                    <!-- 🔹 MAIN BILLING ROW (UNCHANGED) -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $billing->control_number }}</td>
                        <td class="px-4 py-2">{{ $billing->employer->name }}</td>
                        <td class="px-4 py-2">{{ $billing->employer->PEN }}</td>
                        <td class="px-4 py-2">&#8369;{{ number_format($billing->amount, 2) }}</td>
                        <td class="px-4 py-2">{{ $billing->applicable_period }}</td>
                        <td class="px-4 py-2">{{ $billing->no_of_months }}</td>
                        <td class="px-4 py-2">&#8369;{{ number_format($billing->premium, 2) }}</td>
                        <td class="px-4 py-2">&#8369;{{ number_format($billing->interest, 2) }}</td>
                        <td class="px-4 py-2">{{ $billing->type }}</td>
                        <td class="px-4 py-2">{{ $billing->status }}</td>

                        <td class="{{ ($billing->is_overdue && $billing->status == 'Issued') ? 'text-red-600 font-semibold' : '' }} px-4 py-2">
                            {{ $billing->status_date }}
                        </td>

                        <td class="px-4 py-2">
                            @if ($billing->file_path)
                                <a href="{{ asset('storage/' . $billing->file_path) }}" target="_blank"
                                class="text-blue-600 hover:underline">View</a>
                            @else
                                No file
                            @endif
                        </td>

                        <td class="px-4 py-2">{{ $billing->remarks }}</td>
                        <td class="px-4 py-2">{{ $billing->latest }}</td>

                        <!-- 🔹 ACTIONS: only ADD View History -->
                        <td class="px-4 py-2 flex space-x-3">
                            <a href="{{ route('billing.edit', $billing) }}"
                            class="text-blue-600 hover:underline">Edit</a>

                            <button
                                type="button"
                                @click="open = !open"
                                class="text-indigo-600 hover:underline">
                                View History
                            </button>

                            <form action="{{ route('billing.destroy', $billing) }}"
                                method="POST"
                                onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- 🔹 HISTORY ROW (NEW, COLLAPSIBLE) -->
                    <tr x-show="open" x-transition>
                        <td colspan="15" class="bg-gray-50 p-4">

                            @if ($billing->billing_histories->count())
                                <table class="min-w-full text-sm border text-gray-600">
                                    <thead class="bg-gray-200 text-xs uppercase">
                                        <tr>
                                            <th class="px-2 py-1">Old Status</th>
                                            <th class="px-2 py-1">New Status</th>
                                            <th class="px-2 py-1">Old Date</th>
                                            <th class="px-2 py-1">New Date</th>
                                            <th class="px-2 py-1">Old Remarks</th>
                                            <th class="px-2 py-1">New Remarks</th>
                                            <th class="px-2 py-1">Old Editor</th>
                                            <th class="px-2 py-1">New Editor</th>
                                            <th class="px-2 py-1">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($billing->billing_histories as $history)
                                            <tr class="border-b">
                                                <td class="px-2 py-1">{{ $history->old_status }}</td>
                                                <td class="px-2 py-1">{{ $history->new_status }}</td>
                                                <td class="px-2 py-1">{{ $history->old_status_date }}</td>
                                                <td class="px-2 py-1">{{ $history->new_status_date }}</td>
                                                <td class="px-2 py-1">{{ $history->old_remarks }}</td>
                                                <td class="px-2 py-1">{{ $history->new_remarks }}</td>
                                                <td class="px-2 py-1">{{ $history->old_latest }}</td>
                                                <td class="px-2 py-1">{{ $history->new_remarks }}</td>
                                                <td class="px-2 py-1">{{ $history->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-sm text-gray-500">
                                    No billing history found.
                                </div>
                            @endif

                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>

            <div class="mt-4">
                {{ $billings->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
