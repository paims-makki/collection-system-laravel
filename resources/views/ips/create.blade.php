<!-- resources/views/students/create.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New Task</h2>

        <form action="{{ route('ips.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
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
                <label class="block text-sm font-medium text-gray-700">Perpective</label>
                <input type="text" name="perspective" value="{{ old('perspective') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('perspective')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Responsible Unit</label>
                <input type="text" name="responsible_unit" value="{{ old('responsible_unit') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('responsible_unit')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Specific Task</label>
                <input type="text" name="specific_task" value="{{ old('specific_task') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('specific_task')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Requestor</label>
                <input type="text" name="requestor" value="{{ old('requestor') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('requestor')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Target Output</label>
                <input type="text" name="target_output" value="{{ old('target_output') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('target_output')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Actual Output</label>
                <input type="text" name="actual_output" value="{{ old('actual_output') }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('actual_output')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Type --</option>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Transmitted" {{ old('status') == 'Transmitted' ? 'selected' : '' }}>Transmitted</option>
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
                <label class="block text-sm font-medium text-gray-700">Creator</label>
                <input type="text" name="editor" value="{{ auth()->user()->name }}" readonly
                    class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2">
                @error('editor')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('ips.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
