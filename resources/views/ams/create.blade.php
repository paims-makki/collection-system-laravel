<!-- resources/views/ams/create.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Import Excel</h2>

        <form action="{{ route('ams.import') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5">
            @csrf

            <!-- Employer (optional, keep if needed) -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Upload Excel File
                </label>

                <input type="file"
                    name="excel_file"
                    accept=".xlsx,.xls,.csv"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white
                            focus:outline-none focus:ring-2 focus:ring-blue-500">

                <p class="text-xs text-gray-500 mt-1">
                    Accepted formats: .xlsx, .xls, .csv
                </p>

                @error('excel_file')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

    

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('ams.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
                    Cancel
                </a>

                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">
                    Upload
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
