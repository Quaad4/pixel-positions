@props(['job'])

<x-panel class="flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>
    <div class="py-8">
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300">{{ $job->title }}</h3>
        <p class="text-sm mt-4">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>            
            @foreach ($job->tags as $tag)
                <x-tag size="small">{{ $tag->name }}</x-tag>
            @endforeach            
        </div>

        <x-employer-logo :width="42"></x-employer-logo>
    </div>
</x-panel>