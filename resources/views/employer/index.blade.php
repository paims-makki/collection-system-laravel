<!-- resources/views/students/index.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Employers</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('employer.index') }}" class="mb-6 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or PEN"
                class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Search</button>
        </form>

        <div class="mb-4">
            <a href="{{ route('employer.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + New Employer
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">PEN</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">No. of EE</th>
                        <th class="px-4 py-3">Name of Head</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Classification</th>
                        <th class="px-4 py-3">Latest</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employers as $employer)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $employer->name }}</td>
                            <td class="px-4 py-2">{{ $employer->PEN }}</td>
                            <td class="px-4 py-2">{{ $employer->address }}</td>
                            <td class="px-4 py-2">{{ $employer->no_of_employees }}</td>
                            <td class="px-4 py-2">{{ $employer->name_of_head }}</td>
                            <td class="px-4 py-2">{{ $employer->type }}</td>
                            <td class="px-4 py-2">{{ $employer->classification }}</td>
                            <td class="px-4 py-2">{{ $employer->latest }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('employer.edit', $employer) }}"
                                   class="text-blue-600 hover:underline px-4">Edit</a>
                                <form action="{{ route('employer.destroy', $employer) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $employers->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
