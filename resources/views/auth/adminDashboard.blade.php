<x-layout>


    <div class="">
        <!-- Tab buttons -->
        <div class="tab flex justify-center text-slate-500 rounded-md">
            <button class="tablinks active" onclick="openTable(event, 'Table1')">Users</button>
            <button class="tablinks" onclick="openTable(event, 'Table2')">Posts</button>
        </div>

        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        <!-- Tables -->
        <div id="Table1" class="table-content active bg-gray-800 bg-opacity-75 border-2 rounded-lg text-white ">
            <table class="m-3">
                <tr class="mt-1">
                    <th class="pr-3">Id</th>
                    <th class="pr-3">Username</th>
                    <th class="pr-3">email</th>
                    <th class="pl-3 pr-3">IsAdmin</th>
                    <th class=pr-5 ">Others</th>

                </tr>
                      @foreach ($users as $user)
                <tr class="">
                    <td class="">{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="pl-3 p-1 m-11">{{ $user->isAdmin }}</td>
                    <td class="flex justify-center bg-green-600 max-w-[60px]"><a
                            href="{{ route('posts.user', $user->id) }}">View</a></td>
                    <form action="{{ route('profileDestroy', ['user' => $user->id]) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete {{ $user->username }}?')">
                        @csrf
                        @method('DELETE')
                        <td class="flex justify-center bg-red-600 max-w-[60px]"><a><button>Delete</button></a>
                        </td>

                    </form>
                    @if ($user->isAdmin === 0)
                        <form action="{{ route('adminPromote', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to promore {{ $user->username }}?')">

                            @csrf
                            <td class="flex justify-center bg-blue-600 max-w-[60px] mb-3"><a><button>Promo</button></a>
                            </td>
                        </form>
                    @else
                        <form action="{{ route('adminDemote', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to demote {{ $user->username }}?')">

                            @csrf
                            <td class="flex justify-center bg-blue-600 max-w-[60px] mb-3"><a><button>Demo</button></a>
                            </td>
                        </form>
                    @endif

                </tr>
                @endforeach

            </table>
        </div>

        <div id="Table2" class="table-content deactive bg-gray-800 bg-opacity-75 border-2 rounded-lg text-white ">
            <table class="m-3">
                <tr>
                    <th class="pr-3">Id</th>
                    <th class="pr-3">User_id</th>
                    <th class="pr-3">Title</th>
                    <th class="pr-3">Created_at</th>
                    <th class="pr-3">Catagory</th>
                    <th class=pr-5 ">Others</th>
                </tr>
                      @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->catagory }}</td>
                    <td class="flex justify-center bg-green-600 max-w-[60px]"><a
                            href="{{ route('posts.show', $post->id) }}">View</a></td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <td class="flex justify-center bg-red-600 max-w-[60px] mb-3"><button>Delete</button></td>
                    </form>
                </tr>
                @endforeach

            </table>
        </div>


    </div>



</x-layout>
