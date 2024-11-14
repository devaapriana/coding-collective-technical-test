@extends('layout.main')
@section('content')
    <div class="relative mx-auto overflow-x-auto shadow-md sm:rounded-lg">
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
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            <label class="inline-flex items-center me-5 cursor-pointer">
                                <input type="checkbox" value="{{ $user->status }}" class="sr-only peer"
                                    onchange="confirm('ubah') ? changeStatus(this) : ''" data-id="{{ $user->id }}"
                                    @if ($user->status == 'active') checked @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user->status }}</span>
                            </label>

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script>
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        function changeStatus(e) {
            let currentStatus = $(e).val();
            let currentId = $(e).attr('data-id');
            $.ajax({
                url: "/users/" + currentId,
                type: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    status: currentStatus
                }),
                success: function(result) {
                    console.log(result.message);
                    alert(result.message)
                    window.location.href = '/'
                }
            });
        }
    </script>
@endpush
