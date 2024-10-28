<x-layout>
    <x-slot:heading>
        Careers Page
    </x-slot:heading>
    @foreach($careers as $career)
        <li>
            <a href="/careers/{{ $career['id'] }}" target="_blank" class="hover:underline dark:hover:text-blue-300">
                {{ $career['title'] }}: Pay {{ $career['salary'] }} per year
            </a>
        </li>
    @endforeach
</x-layout>
