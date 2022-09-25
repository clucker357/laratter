<!-- resources/views/tweet/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tweet Index') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">tweet</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tweets as $tweet)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                <div class="flex">
                    <a href="{{ route('follow.show', $tweet->user->id) }}">
                      <p class="text-left text-grey-dark">{{$tweet->user->name}}</p>
                    </a>
                    <!-- follow 状態で条件分岐 -->
                    @if(Auth::user()->followings()->where('users.id', $tweet->user->id)->exists())
                    <!-- unfollow ボタン -->
                    <form action="{{ route('unfollow', $tweet->user) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-red-500" fill="yellow" viewBox="0 0 24 24" stroke="red">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                        </svg>
                        {{ $tweet->user->followers()->count() }}
                      </button>
                    </form>
                    @else
                    <!-- follow ボタン -->
                    <form action="{{ route('follow', $tweet->user) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                        </svg>
                        {{ $tweet->user->followers()->count() }}
                      </button>
                    </form>
                    @endif
                  </div>
                  <a href="{{ route('tweet.show',$tweet->id) }}">
                    <!-- 🔽 追加 -->
                    <p class="text-left text-grey-dark">{{$tweet->user->name}}</p>
                    <h3 class="text-left font-bold text-lg text-grey-dark">{{$tweet->tweet}}</h3>
                  </a>
                  <div class="flex">
                  @if($tweet->users()->where('user_id', Auth::id())->exists())
                    <!-- unfavorite ボタン -->
                    <form action="{{ route('unfavorites',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        {{ $tweet->users()->count() }}
                      </button>
                    </form>
                    @else
                    <!-- favorite ボタン -->
                    <form action="{{ route('favorites',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        {{ $tweet->users()->count() }}
                      </button>
                    </form>
                    @endif
                    @if($tweet->reporters()->where('user_id', Auth::id())->exists())
                    <!-- unreport ボタン -->
                    <form action="{{ route('unreports',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 15px; height: 15px; opacity: 1;" xml:space="preserve">
                      <style type="text/css">
                      .st0{fill:#4B4B4B;}
                      </style>
                        <g>
                        <path class="st0" d="M256.007,357.113c-16.784,0-30.411,13.613-30.411,30.397c0,16.791,13.627,30.405,30.411,30.405
                          s30.397-13.614,30.397-30.405C286.405,370.726,272.792,357.113,256.007,357.113z" style="fill: rgb(255, 200, 0);"></path>
                        <path class="st0" d="M505.097,407.119L300.769,53.209c-9.203-15.944-26.356-25.847-44.777-25.847
                          c-18.407,0-35.544,9.904-44.747,25.847L6.902,407.104c-9.203,15.943-9.203,35.751,0,51.694c9.204,15.943,26.356,25.84,44.763,25.84
                          h408.67c18.406,0,35.559-9.897,44.762-25.84C514.301,442.855,514.301,423.047,505.097,407.119z M464.465,432.405
                          c-2.95,5.103-8.444,8.266-14.35,8.266H61.878c-5.892,0-11.394-3.163-14.329-8.281c-2.964-5.11-2.979-11.445-0.014-16.548
                          l194.122-336.24c2.943-5.103,8.436-8.274,14.35-8.274c5.9,0,11.386,3.171,14.336,8.282l194.122,336.226
                          C467.415,420.945,467.415,427.295,464.465,432.405z" style="fill: rgb(255, 200, 0);"></path>
                        <path class="st0" d="M256.007,152.719c-16.784,0-30.411,13.613-30.411,30.405l11.68,137.487c0,10.346,8.378,18.724,18.731,18.724
                              c10.338,0,18.731-8.378,18.731-18.724l11.666-137.487C286.405,166.331,272.792,152.719,256.007,152.719z" style="fill: rgb(255, 200, 0);"></path>
                          </g>
                      </svg>
                        {{ $tweet->reporters()->count() }}
                      </button>
                    </form>
                    @elseif($tweet->reporters()->count() > 2)
                    <form action="{{ route('tweet.destroy',$tweet->id) }}" method="POST" class="text-left">
                      @method('delete')
                      @csrf
                      <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 15px; height: 15px; opacity: 1;" xml:space="preserve">
                      <style type="text/css">
                      .st0{fill:#4B4B4B;}
                      </style>
                        <g>
                        <path class="st0" d="M256.007,357.113c-16.784,0-30.411,13.613-30.411,30.397c0,16.791,13.627,30.405,30.411,30.405
                          s30.397-13.614,30.397-30.405C286.405,370.726,272.792,357.113,256.007,357.113z" style="fill: rgb(75, 75, 75);"></path>
                        <path class="st0" d="M505.097,407.119L300.769,53.209c-9.203-15.944-26.356-25.847-44.777-25.847
                          c-18.407,0-35.544,9.904-44.747,25.847L6.902,407.104c-9.203,15.943-9.203,35.751,0,51.694c9.204,15.943,26.356,25.84,44.763,25.84
                          h408.67c18.406,0,35.559-9.897,44.762-25.84C514.301,442.855,514.301,423.047,505.097,407.119z M464.465,432.405
                          c-2.95,5.103-8.444,8.266-14.35,8.266H61.878c-5.892,0-11.394-3.163-14.329-8.281c-2.964-5.11-2.979-11.445-0.014-16.548
                          l194.122-336.24c2.943-5.103,8.436-8.274,14.35-8.274c5.9,0,11.386,3.171,14.336,8.282l194.122,336.226
                          C467.415,420.945,467.415,427.295,464.465,432.405z" style="fill: rgb(75, 75, 75);"></path>
                        <path class="st0" d="M256.007,152.719c-16.784,0-30.411,13.613-30.411,30.405l11.68,137.487c0,10.346,8.378,18.724,18.731,18.724
                              c10.338,0,18.731-8.378,18.731-18.724l11.666-137.487C286.405,166.331,272.792,152.719,256.007,152.719z" style="fill: rgb(75, 75, 75);"></path>
                          </g>
                      </svg>
                      </button>
                    </form>

                    @else
                    <!-- report ボタン -->
                    <form action="{{ route('reports',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 15px; height: 15px; opacity: 1;" xml:space="preserve">
                      <style type="text/css">
                      .st0{fill:#4B4B4B;}
                      </style>
                        <g>
                        <path class="st0" d="M256.007,357.113c-16.784,0-30.411,13.613-30.411,30.397c0,16.791,13.627,30.405,30.411,30.405
                          s30.397-13.614,30.397-30.405C286.405,370.726,272.792,357.113,256.007,357.113z" style="fill: rgb(75, 75, 75);"></path>
                        <path class="st0" d="M505.097,407.119L300.769,53.209c-9.203-15.944-26.356-25.847-44.777-25.847
                          c-18.407,0-35.544,9.904-44.747,25.847L6.902,407.104c-9.203,15.943-9.203,35.751,0,51.694c9.204,15.943,26.356,25.84,44.763,25.84
                          h408.67c18.406,0,35.559-9.897,44.762-25.84C514.301,442.855,514.301,423.047,505.097,407.119z M464.465,432.405
                          c-2.95,5.103-8.444,8.266-14.35,8.266H61.878c-5.892,0-11.394-3.163-14.329-8.281c-2.964-5.11-2.979-11.445-0.014-16.548
                          l194.122-336.24c2.943-5.103,8.436-8.274,14.35-8.274c5.9,0,11.386,3.171,14.336,8.282l194.122,336.226
                          C467.415,420.945,467.415,427.295,464.465,432.405z" style="fill: rgb(75, 75, 75);"></path>
                        <path class="st0" d="M256.007,152.719c-16.784,0-30.411,13.613-30.411,30.405l11.68,137.487c0,10.346,8.378,18.724,18.731,18.724
                              c10.338,0,18.731-8.378,18.731-18.724l11.666-137.487C286.405,166.331,272.792,152.719,256.007,152.719z" style="fill: rgb(75, 75, 75);"></path>
                          </g>
                      </svg>
                        {{ $tweet->reporters()->count() }}
                      </button>
                    </form>
                    @endif
                    @if ($tweet->user_id === Auth::user()->id)
                    <!-- 更新ボタン -->
                    <form action="{{ route('tweet.edit',$tweet->id) }}" method="GET" class="text-left">
                      @csrf
                      <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </button>
                    </form>
                    <!-- 削除ボタン -->
                    <form action="{{ route('tweet.destroy',$tweet->id) }}" method="POST" class="text-left">
                      @method('delete')
                      @csrf
                      <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </form>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

