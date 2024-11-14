@extends('layout.main')
@section('content')
    <h1 class="font-bold text-center mb-4">Employee Attendance</h1>

    <div class="flex w-full gap-4 justify-around">

        <div
            class="w-full self-center lg:w-[40%] h-fit p-3 items-center flex flex-col bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Welcome
                    {{ Auth::user()->name }}</h5>
            </a>
            <div>
                <span class="font-normal text-gray-400 dark:text-gray-400">{{ Auth::user()->email }} | </span>
                <span class="font-normal text-gray-400 dark:text-gray-400">{{ Auth::user()->employee->city }}</span>
            </div>
            <br>
            <div class="flex -mt-5 gap-2">
                <form action="{{ route('attendance.active') }}" method="POST">
                    @csrf
                    <input type="hidden" class="userTimezone" name="userTimezone">

                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 mt-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Active
                    </button>
                </form>
                <form action="{{ route('attendance.inactive') }}" method="POST">
                    @csrf
                    <input type="hidden" class="userTimezone" name="userTimezone">

                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 mt-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Inactive
                    </button>
                </form>
            </div>
        </div>

        <table
            class="w-full lg:w-[60%] rounded-lg shadow text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 rounded-lg uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <label class="inline-flex items-center me-5 cursor-pointer">
                                <input type="checkbox" value="{{ $attendance->status }}" class="sr-only peer"
                                    onchange="changeStatus(this)" data-id="{{ $attendance->id }}"
                                    @if ($attendance->status == 'active') checked @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $attendance->status }}</span>
                            </label>

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    </div>
@endsection

@push('script')
    <script>
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            const userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            $('.userTimezone').val(userTimezone);
        });

        function changeStatus(e) {
            let currentStatus = $(e).val();
            let userTimezone = $('.userTimezone').val();
            let currentId = $(e).attr('data-id');
            $.ajax({
                url: "/attendances/" + currentId,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    status: currentStatus,
                    userTimezone: userTimezone
                }),
                success: function(result) {
                    alert(result.message)
                    window.location.href = '/attendances'
                }
            });
        }
    </script>
@endpush
