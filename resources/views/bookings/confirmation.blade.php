<x-app-layout>
    <div class="space-y-12">
        <div>
            <h2 class="text-xl font-medium mt-3">{{ !$appointment->cancelled() ? '¡Gracias, su reservación se realizó con éxito! 🥳' : 'Cancelled' }}</h2>
            <div class="flex mt-6 space-x-3 bg-slate-100 rounded-lg p-4">
                <img src="{{ $appointment->employee->profile_photo_url }}" class="rounded-lg size-14 bg-slate-100">
                <div class="w-full">
                    <div class="flex justify-between">
                        <div class="font-semibold">
                            {{ $appointment->service->title }} ({{ $appointment->service->duration }} minutos)
                        </div>
                        <div class="text-sm">
                            {{ $appointment->service->price }}
                        </div>
                    </div>
                    <div class="text-sm">
                        {{ $appointment->employee->name }}
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-medium mt-3">Cuando</h2>
            <div class="mt-4 bg-slate-100 rounded-lg p-4">
                {{ $appointment->starts_at->format('F d Y \d\e H:i') }} hasta {{ $appointment->ends_at->format('H:i') }}
            </div>
        </div>

        @if (!$appointment->cancelled())
            <form
                method="post"
                action="{{ route('appointments.destroy', $appointment) }}"
                x-data
                x-on:submit.prevent="
                    if (window.confirm('Are you sure?')) {
                        $el.submit()
                    }
                "
            >
                @csrf
                @method('DELETE')
                <button class="text-blue-500 hover:text-red-500">Cancelar reservación</button>
            </form>
        @endif
    </div>
</x-app-layout>
