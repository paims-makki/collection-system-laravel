<!-- resources/views/students/edit.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-gray-50 shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Employer</h2>

        <form action="{{ route('employer.update', $employer) }}" method="POST" class="space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $employer->name) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                @error('name')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">PEN</label>
                <input type="text" name="PEN" value="{{ old('PEN', $employer->PEN) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                @error('PEN')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" value="{{ old('address', $employer->address) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                @error('address')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of Employees</label>
                <input type="number" name="no_of_employees" value="{{ old('no_of_employees', $employer->no_of_employees) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                @error('no_of_employees')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Name of Head</label>
                <input type="text" name="name_of_head" value="{{ old('name_of_head', $employer->name_of_head) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                @error('name_of_head')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Type</label>
                <select name="type" id="type" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                    <option value="">-- Select Type --</option>
                    <option value="Private" {{ old('type', $employer->type) == 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="Government" {{ old('type', $employer->type) == 'Government' ? 'selected' : '' }}>Government</option>
                </select>
                @error('type')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Classification</label>
                <select name="classification" id="classification" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                    <option value="">-- Select Classification --</option>
                    <option value="xl" {{ old('classification', $employer->classification) == 'xl' ? 'selected' : '' }}>XL</option>
                    <option value="Large" {{ old('classification', $employer->classification) == 'Large' ? 'selected' : '' }}>Large</option>
                    <option value="Retail" {{ old('classification', $employer->classification) == 'Retail' ? 'selected' : '' }}>Retail</option>
                    <option value="Micro" {{ old('classification', $employer->classification) == 'Micro' ? 'selected' : '' }}>Micro</option>
                </select>
                @error('classification')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Creator</label>
                <input type="text" name="latest" value="{{ auth()->user()->name }}" readonly
                    class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 text-gray-800">
                @error('latest')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('employer.index') }}"
                   class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
