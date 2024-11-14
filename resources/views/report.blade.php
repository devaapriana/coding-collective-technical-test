@extends('layout.main')
@section('content')
    <div class="relative w-fit mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $attendance->employee->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->employee->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($attendance->time)->format('d F Y, h:i A') }}
                        </td>
                        <td class="px-6 py-4">


                            <div class="p-4 mb-4 text-sm {{ $attendance->status == 'active' ? 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400' : 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400' }} rounded-lg  "
                                role="alert">
                                <span class="font-medium">{{ $attendance->status }}
                            </div>

                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>
        <div class="p-3 bg-slate-100">

            {{ $attendances->links() }}
        </div>
    </div>
@endsection
