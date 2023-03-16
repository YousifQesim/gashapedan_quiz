
<x-app-layout>
    @php
        $request = Request::capture();
        

        $path = $request->path();
        
    @endphp
    @if (!Str::contains($path, "Self"))
        
    <div class="">
        <div class="relative mr-4">
            <form action="resultSearch"  method="GET">

                <input type="text" name="search"
                class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block  appearance-none leading-normal  lg:w-1/3 sm:w-full my-5 ml-5 "
                placeholder="Search">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg class="h-6 w-6 lg:w-1/3 sm:w-full  text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                    d="M22 22L15.5 15.5M15.5 15.5C17.9853 12.7574 17.9853 8.24264 15.5 5.5C13.0147 2.75736 8.98528 2.75736 6.5 5.5C4.01472 8.24264 4.01472 12.7574 6.5 15.5C8.98528 18.2426 13.0147 18.2426 15.5 15.5Z" />
                </svg>
            </div>
        </div>
        <input type="submit" value="Search" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5" >
    </form>
</div>

@endif

<div class="flex flex-col">
    <div class="overflow-x-auto ">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    

                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600 min-w-full  ">
                            <tr class="">
                                <th scope="col " class="px-6 py-4">id</th>
                                <th scope="col" class="px-6 py-4">Studnet name</th>
                                <th scope="col" class="px-6 py-4">quiz title</th>
                                <th scope="col" class="px-6 py-4">score</th>
                                <th scope="col" class="px-6 py-4">outof</th>
                            </tr>
                        </thead>
                    
                    <tbody>
                        @foreach ($results as $result)
                        @if ($loop->iteration % 2 == 0) 
                        <tr class="border-b bg-white dark:border-neutral-500 dark:bg-neutral-600">
                        @else
                        <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                            @endif
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $result->id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $result->user->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $result->quiz->title }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $result->score }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ count($result->quiz->questions) }}</td>
                        </tr>
                      
                        
                        
                        
                        @endforeach
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</tbody>
</table>
{{ $results->links() }}
<p>result</p>
    </x-app-layout>