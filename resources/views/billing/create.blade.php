<!-- resources/views/students/create.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New Billing</h2>

        <form action="{{ route('billing.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
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
                    <option value="Delinquency" {{ old('type') == 'Delinquency' ? 'selected' : '' }}>Delinquency</option>
                    <option value="Under-payment" {{ old('type') == 'Under-payment' ? 'selected' : '' }}>Under-payment</option>
                    <option value="Differential-EO-62" {{ old('type') == 'Differential-EO-62' ? 'selected' : '' }}>Differential E. O. 62</option>
                    <option value="Differential-one-percent" {{ old('type') == 'Differential-one-percent' ? 'selected' : '' }}>Differential 1%</option>
                    <option value="Penalty" {{ old('type') == 'Penalty' ? 'selected' : '' }}>Penalty</option>
                    <option value="Penalty-differential" {{ old('type') == 'Penalty-differential' ? 'selected' : '' }}>Penalty Differential</option>
                </select>
                @error('type')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Control Number</label>
                <input type="text" name="control_number" value="{{ old('control_number') }}" required
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
                    <option value="Generated" {{ old('status') == 'Generated' ? 'selected' : '' }}>Generated</option>
                    <option value="Issued" {{ old('status') == 'Issued' ? 'selected' : '' }}>Issued</option>
                    <option value="Case-Folder" {{ old('status') == 'Case-Folder' ? 'selected' : '' }}>Case Folder</option>
                    <option value="Settled" {{ old('status') == 'Settled' ? 'selected' : '' }}>Settled</option>
                </select>
                @error('status')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status Date</label>
                <input type="date" name="status_date" required
                    class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2">
                @error('status_date')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter remarks or notes here...">{{ old('remarks') }}</textarea>
                @error('remarks')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">Scanned copy</label>
                <input type="file" name="file_path" required
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
