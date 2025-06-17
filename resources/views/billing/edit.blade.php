<!-- resources/views/students/create.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Billing</h2>

        <form action="{{ route('billing.update', $billing) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium text-gray-700">Employer</label>
                <select name="employer_id" id="employer_id" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Employer --</option>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}" {{ old('employer_id', $billing->employer_id) == $employer->id ? 'selected' : '' }}>
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
                <input type="number" step="0.01" name="amount" value="{{ old('amount', $billing->amount) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('amount')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Applicable Period</label>
                <input type="text" name="applicable_period" value="{{ old('applicable_period', $billing->applicable_period) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('applicable_period')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of Months</label>
                <input type="number" name="no_of_months" value="{{ old('no_of_months', $billing->no_of_months) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_months')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Premium</label>
                <input type="number" step="0.01" name="premium" value="{{ old('premium', $billing->premium) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('premium')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Interest</label>
                <input type="number" step="0.01" name="interest" value="{{ old('interest', $billing->interest) }}" required
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
                    <option value="Regular" {{ old('type', $billing->type) == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="Under-payment" {{ old('type', $billing->type) == 'Under-payment' ? 'selected' : '' }}>Under-payment</option>
                    <option value="Differential" {{ old('type', $billing->type) == 'Differential' ? 'selected' : '' }}>Differential</option>
                    <option value="Differential-interest" {{ old('type', $billing->type) == 'Differential-interest' ? 'selected' : '' }}>Differential-interest</option>
                </select>
                @error('type')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Control Number</label>
                <input type="text" name="control_number" value="{{ old('control_number', $billing->control_number) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('control_number')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Type --</option>
                    <option value="Generated" {{ old('status', $billing->status) == 'Generated' ? 'selected' : '' }}>Generated</option>
                    <option value="Issued" {{ old('status', $billing->status) == 'Issued' ? 'selected' : '' }}>Issued</option>
                    <option value="Case-Folder" {{ old('status', $billing->status) == 'Case-Folder' ? 'selected' : '' }}>Case Folder</option>
                </select>
                @error('status')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Current file:</label>
                @if ($billing->file_path)
                    <a href="{{ asset('storage/' . $billing->file_path) }}" target="_blank" class="text-blue-600 underline">
                        View current file
                    </a>
                @else
                    <p class="text-gray-500">No file uploaded.</p>
                @endif
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Upload new file:</label>
                <input type="file" name="file_path"
                class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2">
                @error('file_path')
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
                <a href="{{ route('billing.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
