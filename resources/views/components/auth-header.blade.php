@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <flux:heading size="xl" class="text-smoke-900">{{ $title }}</flux:heading>
    <flux:subheading class="text-smoke-700">{{ $description }}</flux:subheading>
</div>
