<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <p><strong>ID:</strong> {{ $student->id }}</p>
                        <p><strong>Name:</strong> {{ $student->name }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                        <p><strong>Age:</strong> {{ $student->age }}</p>
                        <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
                        <p><strong>Course:</strong> {{ $student->course ?? 'N/A' }}</p>
                        <p><strong>Status:</strong> {{ $student->status ? 'Active' : 'Inactive' }}</p>
                        <p><strong>Created:</strong> {{ $student->created_at->format('Y-m-d H:i') }}</p>
                        <p><strong>Updated:</strong> {{ $student->updated_at->format('Y-m-d H:i') }}</p>
                    </div>
                    <a href="{{ route('students.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
