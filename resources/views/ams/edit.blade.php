<!-- resources/views/ams/edit.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Entry</h2>

        <form action="{{ route('ams.update', $am) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium text-gray-700">Employer Name</label>
                <input type="text" value="{{ $employer->name }}" readonly
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">PEN</label>
                <input type="text" value="{{ $employer->PEN }}" readonly
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">January</label>
                <input type="number" step="0.01" name="january_payment" value="{{ old('january_payment', $am->january_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('january_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_jan" value="{{ old('no_of_ee_jan', $am->no_of_ee_jan) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_jan')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">February</label>
                <input type="number" step="0.01" name="february_payment" value="{{ old('february_payment', $am->february_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('february_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_feb" value="{{ old('no_of_ee_feb', $am->no_of_ee_feb) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_feb')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">March</label>
                <input type="number" step="0.01" name="march_payment" value="{{ old('march_payment', $am->march_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('march_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_march" value="{{ old('no_of_ee_march', $am->no_of_ee_march) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_march')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">April</label>
                <input type="number" step="0.01" name="april_payment" value="{{ old('april_payment', $am->april_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('april_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_april" value="{{ old('no_of_ee_april', $am->no_of_ee_april) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_april')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">May</label>
                <input type="number" step="0.01" name="may_payment" value="{{ old('may_payment', $am->may_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('may_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_may" value="{{ old('no_of_ee_may', $am->no_of_ee_may) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_may')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">June</label>
                <input type="number" step="0.01" name="june_payment" value="{{ old('june_payment', $am->june_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('june_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_june" value="{{ old('no_of_ee_june', $am->no_of_ee_june) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_june')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">July</label>
                <input type="number" step="0.01" name="july_payment" value="{{ old('july_payment', $am->july_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('july_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_july" value="{{ old('no_of_ee_july', $am->no_of_ee_july) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_july')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">August</label>
                <input type="number" step="0.01" name="August_payment" value="{{ old('August_payment', $am->August_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('August_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_august" value="{{ old('no_of_ee_august', $am->no_of_ee_august) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_august')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">September</label>
                <input type="number" step="0.01" name="september_payment" value="{{ old('september_payment', $am->september_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('september_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_sep" value="{{ old('no_of_ee_sep', $am->no_of_ee_sep) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_sep')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">October</label>
                <input type="number" step="0.01" name="october_payment" value="{{ old('october_payment', $am->october_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('october_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_oct" value="{{ old('no_of_ee_oct', $am->no_of_ee_oct) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_oct')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">November</label>
                <input type="number" step="0.01" name="november_payment" value="{{ old('november_payment', $am->november_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('november_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_nov" value="{{ old('no_of_ee_nov', $am->no_of_ee_nov) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_nov')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">December</label>
                <input type="number" step="0.01" name="december_payment" value="{{ old('december_payment', $am->december_payment) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('december_payment')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. of EEs</label>
                <input type="number" name="no_of_ee_dec" value="{{ old('no_of_ee_dec', $am->no_of_ee_dec) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_of_ee_dec')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Type --</option>
                    <option value="Remitting" {{ old('status', $am->status) == 'Remitting' ? 'selected' : '' }}>Remitting</option>
                    <option value="Delinquent" {{ old('status', $am->status) == 'Delinquent' ? 'selected' : '' }}>Delinquent</option>
                    <option value="Non-remitting" {{ old('status', $am->status) == 'Non-remitting' ? 'selected' : '' }}>Non-remitting</option>
                </select>
                @error('status')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter remarks or notes here...">{{ old('remarks', $am->remarks) }}</textarea>
                @error('remarks')
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

            <div>
                <label class="block text-sm font-medium text-gray-700">Year</label>
                <select name="year" id="year" required
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Type --</option>
                    <option value="2023" {{ old('year', $am->year) == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ old('year', $am->year) == '2024' ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ old('year', $am->year) == '2025' ? 'selected' : '' }}>2025</option>
                </select>
                @error('year')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('ams.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Cancel</a>
                <button type="submit"
                        class="bg-blue-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
