<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    @foreach ($jobs as $job)
        <li>{{ $job['title'] }}</li>
    @endforeach

</x-layout>