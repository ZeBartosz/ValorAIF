<x-layout>


    <div class="">
        <!-- Tab buttons -->
        <div class="tab flex justify-center text-white">
            <button class="tablinks active" onclick="openTable(event, 'Table1')">Users</button>
            <button class="tablinks" onclick="openTable(event, 'Table2')">Posts</button>
        </div>

        <!-- Tables -->
        <div id="Table1" class="table-content active bg-gray-800 bg-opacity-75 border-2 rounded-lg text-white ">
            <table class="m-3">
                <tr class="mt-1">
                    <th class="pr-3">Id</th>
                    <th class="pr-3">Username</th>
                    <th class="pr-3">email</th>
                    <th class="pl-3 pr-3">IsAdmin</th>
                    <th class= pr-5 ">Others</th>

                </tr>
                @foreach ($users as $user)
                    <tr class="">
                        <td class="">{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="pl-3 p-1 m-11">{{ $user->isAdmin }}</td>
                        <td class="flex justify-center bg-green-600 max-w-[60px]"><a href="{{ route('posts.user', $user->id)}}">View</a></td>
                        <td class="flex justify-center bg-red-600 max-w-[60px] mb-3"><a href="">Delete</a></td>
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
                    <th class= pr-5 ">Others</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td class="flex justify-center bg-green-600 max-w-[60px]"><a href="{{ route('posts.show', $post->id)}}">View</a></td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
