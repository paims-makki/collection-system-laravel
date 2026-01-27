<!-- resources/views/ams/index.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">IPS Monitoring</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('ips.index') }}"
            class="mb-8 flex flex-col sm:flex-row sm:items-center gap-4 flex-wrap">

            <!-- Search Input -->
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by Perspective, unit, requestor, and status"
                class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" />

            <!-- Date Range Filter -->
            <div class="flex items-center gap-2 flex-wrap">
                <label class="text-sm text-gray-600 font-medium">
                    Date Range:
                </label>

                <input type="date"
                    name="from_date"
                    value="{{ request('from_date') }}"
                    class="px-3 py-2 border border-gray-300 rounded shadow-sm
                        focus:ring-blue-500 focus:border-blue-500">

                <span class="text-gray-500">to</span>

                <input type="date"
                    name="to_date"
                    value="{{ request('to_date') }}"
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
            <a href="{{ route('ips.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Add Task
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Receiving Date</th>
                        <th class="px-4 py-3">Control Number</th>
                        <th class="px-4 py-3">Responsible Unit</th>
                        <th class="px-4 py-3">Perspective</th>
                        <th class="px-4 py-3">Task</th>
                        <th class="px-4 py-3">Employer</th>
                        <th class="px-4 py-3">Requestor</th>
                        <th class="px-4 py-3">Target Output</th>
                        <th class="px-4 py-3">Actual Output</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Remarks</th>
                        <th class="px-4 py-3">Created at</th>
                        <th class="px-4 py-3">Updated at</th>
                        <th class="px-4 py-3">Editor</th>
                        <th class="px-4 py-3">TAT</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                @foreach ($tasks as $task)
                <tbody x-data="{ open: false }">

                    <!-- 🔹 MAIN BILLING ROW (UNCHANGED) -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $task->status_date }}</td>
                        <td class="px-4 py-2">{{ $task->control_number }}</td>
                        <td class="px-4 py-2">{{ $task->responsible_unit }}</td>
                        <td class="px-4 py-2">{{ $task->perspective }}</td>
                        <td class="px-4 py-2">{{ $task->specific_task }}</td>
                        <td class="px-4 py-2">{{ $task->employer->name }}</td>
                        <td class="px-4 py-2">{{ $task->requestor }}</td>
                        <td class="px-4 py-2">{{ $task->target_output }}</td>
                        <td class="px-4 py-2">{{ $task->actual_output}}</td>
                        <td class="px-4 py-2">{{ $task->status }}</td>
                        <td class="px-4 py-2">{{ $task->remarks }}</td>
                        <td class="px-4 py-2">{{ $task->created_at }}</td>
                        <td class="px-4 py-2">{{ $task->updated_at }}</td>
                        <td class="px-4 py-2">{{ $task->editor }}</td>
                        <td class="px-4 py-2">{{ $task->TAT }}</td>
                        

                        <!-- 🔹 ACTIONS: only ADD View History -->
                        <td class="px-4 py-2 flex space-x-3">
                            <a href="{{ route('ips.edit', $task) }}"
                            class="text-blue-600 hover:underline">Edit</a>

                            

                            <form action="{{ route('ips.destroy', $task) }}"
                                method="POST"
                                onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    

                </tbody>
                @endforeach
            </table>

            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
