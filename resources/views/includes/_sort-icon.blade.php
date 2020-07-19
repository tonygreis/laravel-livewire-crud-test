@if ($sortField !== $field)
    <svg class="fill-current font-bold text-teal-500 inline-block h-2 w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/></svg>
    <svg class="fill-current font-bold text-teal-500 inline-block h-2 w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="9 3.828 2.929 9.899 1.515 8.485 10 0 10.707 .707 18.485 8.485 17.071 9.899 11 3.828 11 20 9 20 9 3.828"/></svg>
@elseif ($sortAsc)
    <svg class="fill-current font-bold text-teal-500 inline-block h-2 w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="9 3.828 2.929 9.899 1.515 8.485 10 0 10.707 .707 18.485 8.485 17.071 9.899 11 3.828 11 20 9 20 9 3.828"/></svg>
@else
    <svg class="fill-current font-bold text-teal-500 inline-block h-2 w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/></svg>
@endif
