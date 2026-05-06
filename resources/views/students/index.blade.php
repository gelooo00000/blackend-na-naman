<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4 flex items-center gap-3">
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New Student
                            </a>
                        @endif

                        @if (auth()->user()->role === 'admin')
                            <div class="relative">
                                <form method="GET" action="{{ route('students.index') }}">
                                    <label class="text-sm font-semibold text-gray-700 mr-2">Filter status:</label>
                                    <select name="status" class="border border-gray-300 rounded px-3 py-2">
                                        <option value="all" {{ request('status') === null || request('status') === 'all' ? 'selected' : '' }}>All</option>
                                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Apply</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Age</th>
                                <th class="py-2 px-4 border-b">Address</th>
                                <th class="py-2 px-4 border-b">Course</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                @if(auth()->user()->role === 'admin')
                                <th class="py-2 px-4 border-b">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $student->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->age }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->address ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->course ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <span class="px-2 py-1 rounded text-xs {{ $student->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                            {{ $student->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if(auth()->user()->role === 'admin')
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('students.edit', $student) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center">No students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
