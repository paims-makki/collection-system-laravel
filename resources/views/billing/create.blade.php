<!-- resources/views/students/create.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New Billing</h2>

        <form action="{{ route('billing.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Employer</label>
                <select name="employer_id" id="employer_id" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Employer --</option>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}">
                        {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('amount')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Applicable Period</label>
                <input type="text" name="applicable_period" value="{{ old('applicable_period') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('applicable_period')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of Months</label>
                <input type="number" name="no_of_months" value="{{ old('no_of_months') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_months')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Premium</label>
                <input type="number" step="0.01" name="premium" value="{{ old('premium') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('premium')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Interest</label>
                <input type="number" step="0.01" name="interest" value="{{ old('interest') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('interest')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Type</label>
                <select name="type" id="type" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Type --</option>
                    <option value="Private" {{ old('type') == 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="Government" {{ old('type') == 'Government' ? 'selected' : '' }}>Government</option>
                </select>
                @error('type')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Classification</label>
                <select name="classification" id="classification" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Classification --</option>
                    <option value="xl" {{ old('classification') == 'xl' ? 'selected' : '' }}>XL</option>
                    <option value="Large" {{ old('classification') == 'Large' ? 'selected' : '' }}>Large</option>
                    <option value="Retail" {{ old('classification') == 'Retail' ? 'selected' : '' }}>Retail</option>
                    <option value="Micro" {{ old('classification') == 'Micro' ? 'selected' : '' }}>Micro</option>
                </select>
                @error('classification')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Creator</label>
                <input type="text" name="latest" value="{{ auth()->user()->name }}" readonly
                    class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2">
                @error('latest')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('employer.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
